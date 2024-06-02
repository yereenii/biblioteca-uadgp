<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'apellido_paterno' => 'Doe',
            'apellido_materno' => 'Smith',
            'email' => 'test@example.com',
            'rol_usuario' => 1
        ]);
        
        User::create([
            'name' => 'Carlos Arteaga',
            'apellido_paterno' => 'Arteaga',
            'apellido_materno' => 'Trejo',
            'email' => 'carlos@gmail.com',
            'rol_usuario' => 1,
            'password' => bcrypt('Carlos1234'),
        ]);
        
    }
}
