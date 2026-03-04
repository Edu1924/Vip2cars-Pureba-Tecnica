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
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('cliente_id', true);
            $table->string('nombres', 150)->nullable();
            $table->string('apellidos', 150)->nullable();
            $table->string('numero_documento', 50)->nullable();
            $table->string('correo', 255)->nullable();
            $table->string('telefono', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
