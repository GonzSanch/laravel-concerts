<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conciertos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conciertos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'numero_espectadores',
        'fecha',
        'id_promotor',
        'id_recinto'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'id_promotor',
        'id_recinto',
        'created_at',
        'updated_at'
    ];

    public function promotor()
    {
        return $this->belongsTo(Promotores::class, 'id_promotor');
    }

    public function recinto()
    {
        return $this->belongsTo(Recintos::class, 'id_recinto');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos_Conciertos::class, 'id_concierto');
    }

    public function medios()
    {
        return $this->hasMany(Grupos_Medios::class, 'id_concierto');
    }

}
