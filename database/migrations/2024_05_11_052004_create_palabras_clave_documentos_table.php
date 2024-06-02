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
        Schema::create('palabras_clave_documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('palabra_clave_id');
            $table->timestamps();

            // Definir llaves foráneas
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('palabra_clave_id')->references('id')->on('palabras_clave')->onDelete('cascade');
            
            // Definir llave primaria compuesta
            $table->primary(['documento_id','palabra_clave_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palabras_clave_documentos');
    }
};
