<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;

class tareasController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function index()
    {
        return view('tareas');
    }

    public function create()
    {
        return view('creacion_tareas');
    }

    public function store(validadorTareas $request)
    {
        DB::table('tareas')->insert([
            'nombre' => $request->input('txtnombre'),
            'descripcion' => $request->input('txtdescripcion'),
            'fecha' => $request->input('txtfecha'),
            'hora' => $request->input('txthora'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        session()->flash('exito', 'Se guardó la tarea: ' . $request->input('txtnombre'));

        return redirect()->route('rutaCreacion');
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
