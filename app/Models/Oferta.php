<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'ofertas';

    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = ['idcarrera', 'fecha', 'estado'];
}
