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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('numero_personas');
            $table->text('juegos');
            $table->string('codigo_confirmacion');
            $table->enum('estado', [
            'Pendiente',
            'Entregado',
            'Devuelto',
            'Cancelado'
        ])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
