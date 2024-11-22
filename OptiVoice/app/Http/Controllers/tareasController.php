<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;

class TareasController extends Controller
{

    // Listar tareas
    public function index()
    {
        return view('panel');
    }

    // Crear nueva tarea
    public function create()
    {
        return view('creacion_tareas');
    }

    // Almacenar tarea en la base de datos
    public function storeTareas(validadorTareas $requestT)
    {
        DB::table('tareas')->insert([
            "nombre" => $requestT->input('txtnombre'),
            "descripcion" => $requestT->input('txtdescripcion'),
            "fecha" => $requestT->input('txtfecha'),
            "hora" => $requestT->input('txthora'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $tarea = $requestT->input('txtnombre');
        session()->flash('exito', 'Se registro la tarea: ' . $tarea);

        return to_route('rutaSesion');
    }

    public function show($id) 
    {
        
    }
    public function edit($id) 
    {

    }
    public function update(Request $request, $id) 
    {

    }
    public function destroy($id) 
    {
        
    }
}
