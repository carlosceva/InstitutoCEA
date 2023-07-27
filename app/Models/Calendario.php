<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendarios';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['iduser', 'fecha', 'descripcion','estado'];
}
