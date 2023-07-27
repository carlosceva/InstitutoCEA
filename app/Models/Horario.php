<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['horainicio', 'horafin', 'turno', 'estado'];
}
