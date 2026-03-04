<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'opcion_id';
    public $timestamps = false;

    protected $fillable = [
        'pregunta_id',
        'texto'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id', 'pregunta_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'opcion_id', 'opcion_id');
    }
}
