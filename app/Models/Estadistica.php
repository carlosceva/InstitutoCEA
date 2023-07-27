<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    public function contarModel($id){
        $contar = contador::find($id);
       $num = $contar->visitas+1;
       $contar->visitas=$num;
       $contar->save();
       return $num;
    }
}
