<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos roles
        $admin = Role::create(['name' => 'Admin']);
        $alumnos = Role::create(['name' => 'Alumno']);
        $docentes = Role::create(['name' => 'Docente']);
        $investigadores = Role::create(['name' => 'Investigador']);
        // Creamos permisos basicos y los sincronisamos con un rol
        Permission::create(['name' => 'admin-permission'])->syncRoles($admin);
        Permission::create(['name' => 'alumnos-permission'])->syncRoles($alumnos);
        Permission::create(['name' => 'docentes-permission'])->syncRoles($docentes);
        Permission::create(['name' => 'investigadores-permission'])->syncRoles($investigadores);
       
    }
}
