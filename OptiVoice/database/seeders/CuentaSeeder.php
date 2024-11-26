<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crea un usuario con rol de administrador
        User::create([
            'nombre' => 'Administrador',
            'apellido' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Cambia esta contraseña a algo seguro
            'rol' => 'admin', // Rol asignado
        ]);
    }
}
