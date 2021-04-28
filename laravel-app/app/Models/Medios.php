<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medios extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'promotores';

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
        'nombre'
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

    public function grupos_conciertos()
    {
        return $this->hasMany(Grupos_Conciertos::class);
    }
}
