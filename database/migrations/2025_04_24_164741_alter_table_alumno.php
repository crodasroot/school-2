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
        Schema::table('alumnos', function (Blueprint $table) {
            // Información personal
            $table->string('apellidos')->after('nombre');
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro'])->nullable();
        
            $table->string('cui', 20)->nullable()->unique();
            $table->string('nacionalidad')->default('Guatemalteca');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();

            // Dirección y contacto
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('zona')->nullable();
            $table->text('direccion_detallada')->nullable();
            $table->string('nombre_encargado')->nullable();
            $table->string('telefono_encargado')->nullable();
            $table->string('dpi', 13)->nullable()->unique();
            $table->string('parentesco_encargado')->nullable();

            // Académicos
            $table->string('codigo_alumno')->unique()->nullable();
            $table->string('grado_actual')->nullable();
            $table->string('nivel')->nullable();
            $table->string('seccion')->nullable();
            $table->string('turno')->nullable();
            $table->string('anio_lectivo')->nullable();
            $table->enum('estado', ['activo', 'retirado', 'egresado', 'suspendido'])->default('activo');

            // Administrativos
            $table->date('fecha_inscripcion')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->string('motivo_retiro')->nullable();
            $table->boolean('beca')->default(false);
            $table->string('foto')->nullable();

            // Salud y otros
            $table->string('tipo_sangre')->nullable();
            $table->text('alergias')->nullable();
            $table->text('enfermedades_cronicas')->nullable();
            $table->boolean('discapacidad')->default(false);
            $table->text('descripcion_discapacidad')->nullable();
        });

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
