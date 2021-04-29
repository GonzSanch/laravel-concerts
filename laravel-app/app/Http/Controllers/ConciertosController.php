<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conciertos;
use App\Models\Grupos_Conciertos;
use App\Models\Grupos_Medios;
use App\Notifications\ProfitNotification;

class ConciertosController extends Controller
{
    const GROUPS_PERCENT = 0.1;
    
    public function index()
    {
        $conciertos = Conciertos::all();
        return response()->json($conciertos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    
    public function get(int $id)
    {
        $concierto = Conciertos::with('promotor', 'recinto', 'grupos', 'medios')
        ->find($id);
        return response()->json($concierto, 200, [], JSON_UNESCAPED_UNICODE);
    }
    
    public function create(Request $request)
    {

        $v = \Validator::make($request->all(), [
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'recinto' => 'required|numeric|exists:recintos,id',
            'grupos' => 'required|array',
            'grupos.*' => 'required|numeric|exists:grupos,id',
            'espectadores' => 'required|numeric',
            'promotor' => 'required|numeric|exists:promotores,id',
            'medios' => 'required|array',
            'medios.*' => 'required|numeric|exists:medios,id'
        ]);

        if ($v->fails()) {
            return response()->json([
                'errors' => $v->errors() 
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $concierto = new Conciertos([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'id_recinto' => $request->recinto,
            'id_promotor' => $request->promotor,
            'numero_espectadores' => $request->espectadores,
        ]);
        
        $cache_sum = 0;
        $iterator = 0;
        foreach ($request->grupos as $grupo_id) {
            $grupo_concierto = new Grupos_Conciertos;
            $grupo_concierto->id_grupo = $grupo_id;

            $cache_sum += $grupo_concierto->grupo->cache;
        }

        $venta_entradas = $concierto->recinto->precio_entrada * $concierto->numero_espectadores;
        $gastos = $cache_sum + $concierto->recinto->coste_alquiler + (count($request->grupos) * $this::GROUPS_PERCENT * $venta_entradas);
        $concierto->rentabilidad = $venta_entradas - $gastos;
        $concierto->save();

        foreach ($request->grupos as $grupo_id) {
            $grupo_concierto = new Grupos_Conciertos;
            $grupo_concierto->id_grupo = $grupo_id;

            $concierto->grupos()->save($grupo_concierto);
        }
        foreach ($request->medios as $medio_id) {
            $medios_concierto = new Grupos_Medios;
            $medios_concierto->id_medio = $medio_id;

            $concierto->medios()->save($medios_concierto);
        }

        try {
            $concierto->promotor->notify(new ProfitNotification($concierto));
        } catch (\Swift_TransportException $transportExp) {
            return response()->json([
                'errors' => $transportExp->getMessage()
            ], 403, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json([
            'success' => true,
            'message' => 'Concierto creado correctamente'
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }
}
