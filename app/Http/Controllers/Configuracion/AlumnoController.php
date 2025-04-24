<?php

namespace App\Http\Controllers\Configuracion;

use Inertia\Inertia;
use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumnoController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('configuracion/alumno/Index', [
            'alumno' => Alumno::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('configuracion/alumno/Created');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Información personal
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|in:Masculino,Femenino,Otro',
            'dpi' => 'nullable|string|max:13',
            'cui' => 'nullable|string|max:20',
            'nacionalidad' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',

            // Dirección y contacto
            'departamento' => 'nullable|string|max:100',
            'municipio' => 'nullable|string|max:100',
            'zona' => 'nullable|string|max:10',
            'direccion_detallada' => 'nullable|string',
            'nombre_encargado' => 'nullable|string|max:255',
            'telefono_encargado' => 'nullable|string|max:20',
            'parentesco_encargado' => 'nullable|string|max:100',

            // Académicos
            'codigo_alumno' => 'nullable|string|max:100|unique:alumnos,codigo_alumno',
            'grado_actual' => 'nullable|string|max:100',
            'nivel' => 'nullable|string|max:100',
            'seccion' => 'nullable|string|max:50',
            'turno' => 'nullable|string|max:50',
            'anio_lectivo' => 'nullable|string|max:10',
            'estado' => 'nullable|in:activo,retirado,egresado,suspendido',

            // Administrativos
            'fecha_inscripcion' => 'nullable|date',
            'fecha_retiro' => 'nullable|date',
            'motivo_retiro' => 'nullable|string|max:255',
            'beca' => 'nullable|boolean',
            'foto' => 'nullable|string|max:255',

            // Salud y otros
            'tipo_sangre' => 'nullable|string|max:5',
            'alergias' => 'nullable|string',
            'enfermedades_cronicas' => 'nullable|string',
            'discapacidad' => 'nullable|boolean',
            'descripcion_discapacidad' => 'nullable|string', 
        ]);

        Alumno::create($data);

        return redirect()->route('alumno.index');
    }

    public function edit(Alumno $alumno)
    {
        return Inertia::render('configuracion/alumno/Edit', [
            'alumno' => $alumno
        ]);
    }

    public function update(Request $request, Alumno $alumno)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|in:Masculino,Femenino,Otro',
            'dpi' => 'nullable|string|max:13',
            'cui' => 'nullable|string|max:20',
            'nacionalidad' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'departamento' => 'nullable|string|max:100',
            'municipio' => 'nullable|string|max:100',
            'zona' => 'nullable|string|max:10',
            'direccion_detallada' => 'nullable|string',
            'nombre_encargado' => 'nullable|string|max:255',
            'telefono_encargado' => 'nullable|string|max:20',
            'parentesco_encargado' => 'nullable|string|max:100',
            'codigo_alumno' => 'nullable|string|max:100|unique:alumnos,codigo_alumno,' . $alumno->id,
            'grado_actual' => 'nullable|string|max:100',
            'nivel' => 'nullable|string|max:100',
            'seccion' => 'nullable|string|max:50',
            'turno' => 'nullable|string|max:50',
            'anio_lectivo' => 'nullable|string|max:10',
            'estado' => 'nullable|in:activo,retirado,egresado,suspendido',
            'fecha_inscripcion' => 'nullable|date',
            'fecha_retiro' => 'nullable|date',
            'motivo_retiro' => 'nullable|string|max:255',
            'beca' => 'nullable|boolean',
            'foto' => 'nullable|string|max:255',
            'tipo_sangre' => 'nullable|string|max:5',
            'alergias' => 'nullable|string',
            'enfermedades_cronicas' => 'nullable|string',
            'discapacidad' => 'nullable|boolean',
            'descripcion_discapacidad' => 'nullable|string',
        ]);

        $alumno->update($data);

        return redirect()->route('alumno.index');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumno.index');
    }
}
