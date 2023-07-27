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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser'); // Llave foránea para el usuario relacionado
            $table->unsignedBigInteger('idhorario'); // Llave foránea para el horario relacionado
            $table->string('nombre');
            $table->string('sigla');
            $table->string('estado')->default('activo');
            $table->timestamps();

            // Definir las relaciones con las tablas usuarios y horarios (opcional)
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idhorario')->references('id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
