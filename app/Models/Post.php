<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'anio',
        'nombres',
        'apellidos',
        'documento',
        'correo',
        'telefono',
        'created_at',
    ];

    public const PAGINATE=20;
}
