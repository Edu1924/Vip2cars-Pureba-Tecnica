<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->integer('carro_id', true); 
            $table->integer('cliente_id');
            $table->string('placa', 30)->nullable();
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->integer('anio_fabricacion')->nullable();
            $table->date('createdAt')->nullable();
            
            // Foreign key
            $table->foreign('cliente_id', 'fk_carros_cliente')->references('cliente_id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
