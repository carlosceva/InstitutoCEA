<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contar = new User();
        $contar->name = 'Admin';
        $contar->email = 'admin@gmail.com';
        $contar->password = bcrypt('admin123');
        $contar->rol = 'Admin';
        $contar->estado = 'activo';
        $contar->telefono = 71245689;
        $contar->fechanac = '10/02/1990';
        $contar->save();

        $contar = new User();
        $contar->name = 'Docente';
        $contar->email = 'docente@gmail.com';
        $contar->password = bcrypt('docente123');
        $contar->rol = 'Docente';
        $contar->estado = 'activo';
        $contar->telefono = 71245689;
        $contar->fechanac = '10/02/1990';
        $contar->save();

        $contar = new User();
        $contar->name = 'Secretaria';
        $contar->email = 'secretaria@gmail.com';
        $contar->password = bcrypt('secretaria123');
        $contar->rol = 'Secretaria';
        $contar->estado = 'activo';
        $contar->telefono = 71245689;
        $contar->fechanac = '10/02/1990';
        $contar->save();
    }
}

