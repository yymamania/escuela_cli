<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'alumno';

    protected $fillable = [
        'codigo',
    ];

    public function personas()
    {
        return $this->belongsTo(Personas::class, 'idAlumno', 'idPersona');
    }
}
