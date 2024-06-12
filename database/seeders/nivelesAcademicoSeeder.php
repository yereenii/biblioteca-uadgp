<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NivelesAcademico;

class nivelesAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NivelesAcademico::create([
            'descripcion' => 'Educación Media Básica (Secundaria)'
        ]);
        NivelesAcademico::create([
            'descripcion' => 'Educación Media Superior (Bachillerato)'
        ]);
        NivelesAcademico::create([
            'descripcion' => 'Educación Superior (Licenciatura)'
        ]);
        NivelesAcademico::create([
            'descripcion' => 'Educación de Posgrado'
        ]);
    }
}
