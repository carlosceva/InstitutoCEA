<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['idcarrera', 'nombre', 'sigla', 'estado'];
}
