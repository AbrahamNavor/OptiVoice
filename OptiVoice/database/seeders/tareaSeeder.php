<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tareas')->insert([
            ['nombre' => 'Tarea 1',
            'descripcion' => 'Descripción de la tarea 1',
            'fecha' => '2024-11-15',
            'hora' => '17:13:29',],
            ['nombre' => 'Tarea 2',
            'descripcion' => 'Descripción de la tarea 2',
            'fecha' => '2024-11-15',
            'hora' => '17:13:29',]
        ]);
    }
}
