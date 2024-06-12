<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;

class materiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materia::create([
            'descripcion' => 'Matemáticas'
        ]);
        Materia::create([
            'descripcion' => 'Ciencias Naturales'
        ]);
        Materia::create([
            'descripcion' => 'Historia'
        ]);
        Materia::create([
            'descripcion' => 'Literatura'
        ]);
    }
}
