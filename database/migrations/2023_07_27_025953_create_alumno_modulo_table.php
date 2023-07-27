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
        Schema::create('alumno_modulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idalumno');
            $table->unsignedBigInteger('idmodulo');
            $table->timestamps();

            $table->foreign('idalumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idmodulo')->references('id')->on('modulos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_modulo');
    }
};
