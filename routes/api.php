<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ProfesoresController;

Route::get('/alumnos', [AlumnosController::class, 'index']);
Route::post('/alumnos', [AlumnosController::class, 'store']);

Route::get('/profesores', [ProfesoresController::class, 'index']);

Route::get('/cursos', [CursosController::class, 'index']);