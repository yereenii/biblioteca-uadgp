<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TiposDocumento;

class TiposDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposDocumento::create([
            'descripcion' => 'Revista',
        ]);

        TiposDocumento::create([
            'descripcion' => 'Artículo',
        ]);

        TiposDocumento::create([
            'descripcion' => 'Libro',
        ]);

        TiposDocumento::create([
            'descripcion' => 'Tésis',
        ]);
    }
}
