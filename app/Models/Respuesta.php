<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'respuesta_id';
    public $timestamps = false;

    protected $fillable = [
        'pregunta_id',
        'opcion_id',
        'texto_respuesta',
        'participante_token'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id', 'pregunta_id');
    }

    public function opcion()
    {
        return $this->belongsTo(Opcion::class, 'opcion_id', 'opcion_id');
    }
}
