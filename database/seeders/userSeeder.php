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
        
        User::create([
            'name' => 'Carlos Arteaga',
            'apellido_paterno' => 'Arteaga',
            'apellido_materno' => 'Trejo',
            'email' => 'carlos@gmail.com',
            'rol_usuario' => 1,
            'password' => bcrypt('Carlos1234'),
        ]);

        User::create([
            'name' => 'Alex',
            'apellido_paterno' => 'Carrillo',
            'email' => 'alex@gmail.com',
            'rol_usuario' => 1,
            'password' => bcrypt('Alex1234'),
        ]);

        User::create([
            'name' => 'Yereni',
            'apellido_paterno' => 'Reyes',
            'email' => 'Yereni@gmail.com',
            'rol_usuario' => 1,
            'password' => bcrypt('Yereni1234'),
        ]);
        
    }
}
