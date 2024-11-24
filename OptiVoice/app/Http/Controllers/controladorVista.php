<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;
use Illuminate\Support\Facades\Auth;

class controladorVista extends Controller
{

    // Página principal
    public function home()
    {
        return view('index');
    }

    // Página de inicio
    public function inicio()
    {
        return view('inicio');
    }

    public function redireccion()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Si está autenticado, redirigir al índice del usuario
            return redirect()->route('rutaInicio'); // Cambia 'rutaPanelUsuarios' por la ruta del índice del usuario
        }

        // Si no está autenticado, redirigir al inicio (vista inicial)
        return redirect()->route('rutaIndex'); // Cambia 'rutaInicio' por la ruta de tu vista inicial
    }
}
