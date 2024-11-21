<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;

class TareasController extends Controller
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

    // Página de inicio de sesión
    public function sesion()
    {
        return view('sesion');
    }

    // Página para crear una nueva cuenta
    public function nuevaCuenta()
    {
        return view('nueva_cuenta');
    }

    // Panel de usuarios
    public function panelUsuarios()
    {
        return view('panel_usuarios');
    }

    // Listar tareas
    public function index()
    {
        return view('tareas');
    }

    // Crear nueva tarea
    public function create()
    {
        return view('creacion_tareas');
    }

    // Almacenar tarea
    public function store(validadorTareas $request)
    {
        DB::table('tareas')->insert([
            'nombre' => $request->input('txtnombre'),
            'descripcion' => $request->input('txtdescripcion'),
            'fecha' => $request->input('txtfecha'),
            'hora' => $request->input('txthora'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
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
