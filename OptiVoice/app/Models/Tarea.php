<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tarea extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'tareas'; // Asegúrate de que coincida con el nombre de la tabla

    // Campos rellenables
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'user_id', // Asegúrate de que este campo existe en tu tabla tareas
    ];

    // Relación inversa con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function showTable()
    {
        $tareas = Tarea::all();  // Esto devuelve una colección

        return view('nombre_de_tu_vista', [
            'tareas' => $tareas->toArray(),  // Convertir la colección a array
        ]);
    }
}
