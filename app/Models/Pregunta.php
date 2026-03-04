<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $primaryKey = 'pregunta_id';
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'tipo',
        'obligatorio'
    ];

    public function opciones()
    {
        return $this->hasMany(Opcion::class, 'pregunta_id', 'pregunta_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id', 'pregunta_id');
    }
}
