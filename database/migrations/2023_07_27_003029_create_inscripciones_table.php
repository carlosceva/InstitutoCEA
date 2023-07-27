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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idalumno');
            $table->unsignedBigInteger('idusuario');
            $table->unsignedBigInteger('idcarrera');
            $table->string('fecha');
            $table->string('estado')->default('activo');
            $table->timestamps();

            $table->foreign('idalumno')->references('id')->on('alumnos');
            $table->foreign('idusuario')->references('id')->on('users');
            $table->foreign('idcarrera')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
