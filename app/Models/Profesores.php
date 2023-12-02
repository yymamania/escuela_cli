<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'profesor';

    protected $fillable = [
        'grado',
    ];

    public function personas()
    {
        return $this->belongsTo(Personas::class, 'idProfesor', 'idPersona');
    }
}
