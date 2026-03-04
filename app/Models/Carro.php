<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros';
    protected $primaryKey = 'carro_id';
    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'placa',
        'marca',
        'modelo',
        'anio_fabricacion',
        'createdAt'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
    }
}
