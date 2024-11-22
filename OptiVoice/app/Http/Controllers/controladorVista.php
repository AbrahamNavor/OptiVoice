<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;

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

    // Panel principal
    public function panel()
    {
        return view('panel');
    }

}
