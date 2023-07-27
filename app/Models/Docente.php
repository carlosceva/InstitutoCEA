<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['name', 'email', 'password', 'rol', 'estado', 'fecha_nac', 'telefono'];
}
