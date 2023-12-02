<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Personas;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index() {
        try {
            $alumnos = Alumnos::with('personas')->get();
            $jsonData = $alumnos->map(function ($alumno) {
                return [
                    'idAlumno' => $alumno->idAlumno,
                    'codigo' => $alumno->codigo,
                    'nombres' => $alumno->personas->nombres,
                    'apellidos' => $alumno->personas->apellidos,
                ];
            });
            return response()->json(['data' => $jsonData], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

    public function store(Request $request) {
        try {
            $nombres = $request->input('nombres');
            $apellidos = $request->input('apellidos');
            $codigo = $request->input('codigo');
    
            $persona = new Personas();
            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;
            $persona->save();
        
            $alumno = new Alumnos();
            $alumno->idAlumno = $persona->id;
            $alumno->codigo = $codigo;
            $alumno->save();
    
            return response()->json(['data' => 'Guardado exitosamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
