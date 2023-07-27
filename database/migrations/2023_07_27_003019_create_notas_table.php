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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idalumno');
            $table->unsignedBigInteger('idmodulo');
            $table->integer('nota');
            $table->string('fecha');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('idalumno')->references('id')->on('alumnos');
            $table->foreign('idmodulo')->references('id')->on('modulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
