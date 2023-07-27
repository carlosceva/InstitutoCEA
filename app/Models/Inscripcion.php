<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['idalumno', 'idusuario', 'idcarrera', 'fecha', 'estado'];
}
