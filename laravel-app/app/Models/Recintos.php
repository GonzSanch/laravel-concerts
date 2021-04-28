<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recintos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recintos';

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
        'coste_alquiler',
        'precio_entrada'
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

    public function conciertos()
    {
        return $this->hasMany(Conciertos::class);
    }
}
