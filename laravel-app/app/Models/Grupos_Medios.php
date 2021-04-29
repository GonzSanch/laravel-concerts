<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos_Medios extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grupos_medios';

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
    protected $fillable = [];

    /**
     * The attributes that are added.
     *
     * @var array
     */
    protected $appends = [
        'medio'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'id_medio',
        'id_concierto',
        'created_at',
        'updated_at'
    ];


    public function concierto()
    {
        return $this->belongsTo(Conciertos::class, 'id_concierto');
    }

    public function medio()
    {
        return $this->belongsTo(Medios::class, 'id_medio')
            ->select('nombre');
    }

    public function getMedioAttribute() {
        return $this->medio()->first();
    }
}
