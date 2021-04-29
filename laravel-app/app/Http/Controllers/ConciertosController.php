<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conciertos;

class ConciertosController extends Controller
{
    public function index()
    {
        $conciertos = Conciertos::all();
        return response()->json($conciertos, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function get(int $id)
    {
        $concierto = Conciertos::with('promotor', 'recinto', 'grupos')
            ->find($id);
        return response()->json($concierto, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function create(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'recinto' => 'required|numeric|exists:recintos,id',
            ['gruposIds.*' => 'required|exists:grupos,id'],
            'espectadores' => 'required|numeric',
            'promotor' => 'required|numeric|exists:promotores,id',
            ['medios' => 'required|exists:medios,id']
        ]);

        if ($v->fails()) {
            return response()->json([
                'errors' => $v->errors() 
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }

        $concierto = new Concierto([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'recinto' => $request->recinto,
            'numero_espectadores' => $request->espectadores,
            'promotor' => $request->promotor
        ]);
    }
}
