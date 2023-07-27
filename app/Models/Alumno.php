<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['ci', 'nombre', 'fechanac', 'sexo','email', 'telefono','estado'];

    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'alumno_modulo', 'idalumno', 'idmodulo');
    }
}
