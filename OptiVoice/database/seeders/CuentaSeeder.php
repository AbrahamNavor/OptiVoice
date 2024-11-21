<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            [
                'nombre' => 'Abraham',
                'apellido' => 'Navor',
                'email' => 'navor@example.com',
                'password' => bcrypt('navor'),
            ],
            [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'email' => 'juanperez@example.com',
                'password' => bcrypt('juanperez'),
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Gonzalez',
                'email' => 'mariagonza@example.com',
                'password' => bcrypt('mariagonza'),
            ]
        ]);
    }
}
