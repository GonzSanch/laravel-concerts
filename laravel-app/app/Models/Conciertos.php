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
        'fecha'
    ];

    //TODO: cascade sofdelete ?
    // /**
    //  * The associated elements that's been cascade softdeleted.
    //  *
    //  * @var string
    //  */
    // protected $cascadeDeletes = [
    //     'conciertos'
    // ];

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
