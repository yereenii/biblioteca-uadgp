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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('autor_id');
            $table->string('titulo');
            $table->string('editorial')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->year('fecha_publicacion')->nullable();
            $table->string('archivo_documento')->nullable(); // Referencia al documento en el sistema de archivos
            $table->string('portada_documento')->nullable(); // Referencia al archivo de imagen de portada del doc

            // Foreign key constraints
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
