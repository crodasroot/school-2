<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;


    protected $fillable = [
        // Información personal
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'dpi',
        'cui',
        'nacionalidad',
        'telefono',
        'email',
    
        // Dirección y contacto
        'departamento',
        'municipio',
        'zona',
        'direccion_detallada',
        'nombre_encargado',
        'telefono_encargado',
        'parentesco_encargado',
    
        // Académicos
        'codigo_alumno',
        'grado_actual',
        'nivel',
        'seccion',
        'turno',
        'anio_lectivo',
        'estado',
    
        // Administrativos
        'fecha_inscripcion',
        'fecha_retiro',
        'motivo_retiro',
        'beca',
        'foto',
    
        // Salud y otros
        'tipo_sangre',
        'alergias',
        'enfermedades_cronicas',
        'discapacidad',
        'descripcion_discapacidad',
    ];
    

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
    
}
