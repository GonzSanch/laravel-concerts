<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Promotores extends Model
{
    use HasFactory, Notifiable;

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
        'nombre',
        'email'
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
        return $this->hasMany(Conciertos::class, 'id_promotor');
    }
}
