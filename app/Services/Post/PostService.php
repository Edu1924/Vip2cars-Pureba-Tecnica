<?php

namespace App\Services\Post;

use App\Models\Carro;
use App\Models\Cliente;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PostService
{
    public const PAGINATE = 20;

    public function index() : LengthAwarePaginator
    {        
        $query = Carro::with('cliente')->latest('carro_id');

        return $query->paginate(self::PAGINATE);
    }

    public function createPost(array $data): Carro
    {
        return DB::transaction(function () use ($data) {
            // 1. Guardar primero el Cliente
            $cliente = Cliente::create([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'numero_documento' => $data['documento'],
                'correo' => $data['correo'],
                'telefono' => $data['telefono'],
            ]);

            // 2. Guardar el Carro asociado a ese Cliente
            $carro = Carro::create([
                'cliente_id' => $cliente->cliente_id,
                'placa' => $data['placa'],
                'marca' => $data['marca'],
                'modelo' => $data['modelo'],
                'anio_fabricacion' => $data['anio'],
                'createdAt' => $data['created_at'],
            ]);

            return $carro;
        });
    }

    public function updatePost(array $data, string $id): Carro
    {
        return DB::transaction(function () use ($data, $id) {
            $carro = Carro::findOrFail($id);
            $cliente = $carro->cliente;
            
            $cliente->update([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'numero_documento' => $data['documento'],
                'correo' => $data['correo'],
                'telefono' => $data['telefono'],
            ]);
            
            $carro->update([
                'placa' => $data['placa'],
                'marca' => $data['marca'],
                'modelo' => $data['modelo'],
                'anio_fabricacion' => $data['anio'],
            ]);
            
            return $carro;
        });
    }

    public function deletePost(string $id): void
    {
        DB::transaction(function () use ($id) {
            $carro = Carro::findOrFail($id);            
            $cliente = $carro->cliente;
            $carro->delete();
                        
            if ($cliente && $cliente->carros()->count() === 0) {
                $cliente->delete();
            }
        });
    }
}