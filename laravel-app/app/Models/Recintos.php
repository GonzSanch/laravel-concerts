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

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function conciertos()
    {
        return $this->hasMany(Conciertos::class, 'id_recinto');
    }
}
