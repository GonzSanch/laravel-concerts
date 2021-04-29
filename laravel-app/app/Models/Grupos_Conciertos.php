<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos_Conciertos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grupos_conciertos';

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
        'id_concierto',
        'id_grupo'
    ];

    /**
     * The attributes that are added.
     *
     * @var array
     */
    protected $appends = [
        'grupo'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'id_grupo',
        'id_concierto',
        'created_at',
        'updated_at'
    ];

    public function concierto()
    {
        return $this->belongsTo(Conciertos::class, 'id_concierto');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupos::class, 'id_grupo')->select('nombre', 'cache');
    }

    public function getGrupoAttribute() {
        return $this->grupo()->first();
    }

}
