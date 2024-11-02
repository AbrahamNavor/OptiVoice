<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorTareas;

class controladorVista extends Controller
{
    public function inicio(){
        return view('inicio');
    }

    public function panel(){
        return view('panel');
    }

    public function creacion_tareas(){
        return view('creacion_tareas');
    }

    public function procesarTarea(validadorTareas $request){
        // Validar los datos de la tarea
        $validated = $request->validated();

        // Aquí puedes manejar la lógica después de la validación
        // Por ejemplo, guardar la tarea en la base de datos
        // Tarea::create($validated);

        session()->flash('exito', 'Tarea guardada correctamente');

        return to_route('rutaCreacion');
        //return redirect('/')->with('success', 'Tarea procesada correctamente');
    }
}
