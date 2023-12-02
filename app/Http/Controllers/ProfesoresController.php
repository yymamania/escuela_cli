<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        try {
            $profesores = Profesores::with('personas')->get();
            $jsonData = $profesores->map(function ($profesor) {
                return [
                    'idProfesor' => $profesor->idProfesor,
                    'grado' => $profesor->grado,
                    'nombres' => $profesor->personas->nombres,
                    'apellidos' => $profesor->personas->apellidos,
                ];
            });
            return response()->json(['data' => $jsonData], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
