<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contador;

class ContadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tipo = 1
        $contar = new Contador();
        $contar->nombre = 'Horarios';
        $contar->visitas = 0;
        $contar->tipo = 1;
        $contar->save();
        
        //tipo = 2
        $contar = new Contador();
        $contar->nombre = 'Docentes';
        $contar->visitas = 0;
        $contar->tipo = 2;
        $contar->save();

        //tipo = 3
        $contar = new Contador();
        $contar->nombre = 'Carreras';
        $contar->visitas = 0;
        $contar->tipo = 3;
        $contar->save();

        //tipo = 4
        $contar = new Contador();
        $contar->nombre = 'Ofertas';
        $contar->visitas = 0;
        $contar->tipo = 4;
        $contar->save();
        
        //tipo = 5
        $contar = new Contador();
        $contar->nombre = 'Calendarios';
        $contar->visitas = 0;
        $contar->tipo = 5;
        $contar->save();

        //tipo = 6
        $contar = new Contador();
        $contar->nombre = 'Alumnos';
        $contar->visitas = 0;
        $contar->tipo = 6;
        $contar->save();

        //tipo = 7
        $contar = new Contador();
        $contar->nombre = 'Modulos';
        $contar->visitas = 0;
        $contar->tipo = 7;
        $contar->save();
        
        //tipo = 8
        $contar = new Contador();
        $contar->nombre = 'Notas';
        $contar->visitas = 0;
        $contar->tipo = 8;
        $contar->save();

        //tipo = 9
        $contar = new Contador();
        $contar->nombre = 'Inscripciones';
        $contar->visitas = 0;
        $contar->tipo = 9;
        $contar->save();
    }
}
