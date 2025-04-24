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
        // elimina primero los registros de la tabla asistencias
        Schema::dropIfExists('asistencias');
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained()->onDelete('cascade');
            $table->date('fecha_inicio_semana'); // Lunes de la semana
            $table->json('registros'); // JSON con las asistencias de la semana
            $table->timestamps();
            
            $table->unique(['alumno_id', 'fecha_inicio_semana']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
