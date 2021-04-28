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
        return $this->belongsTo(promotor::class);
    }

    public function recinto()
    {
        return $this->belongsTo(Recinto::class);
    }

    public function grupos_conciertos()
    {
        return $this->hasMany(Grupos_Conciertos::class);
    }

    public function grupos_medios()
    {
        return $this->hasMany(Grupos_Medios::class);
    }

}
