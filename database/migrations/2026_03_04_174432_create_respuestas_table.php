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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->integer('respuesta_id', true);
            $table->integer('pregunta_id');
            $table->integer('opcion_id')->nullable();
            $table->text('texto_respuesta')->nullable();
            $table->string('participante_token', 128)->nullable();
            
            // Foreign keys
            $table->foreign('opcion_id', 'fk_respuestas_opciones')->references('opcion_id')->on('opciones')->onDelete('set null');
            $table->foreign('pregunta_id', 'fk_respuestas_preguntas')->references('pregunta_id')->on('preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
