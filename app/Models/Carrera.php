<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['iduser', 'idhorario', 'nombre', 'sigla','estado'];
}
