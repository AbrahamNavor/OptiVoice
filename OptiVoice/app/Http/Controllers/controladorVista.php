<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorTareas;
use App\Http\Requests\validadorNuevaCuenta;
use App\Http\Requests\validadorInicioSesion;
use Illuminate\Support\Facades\DB;

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

    public function index(){
        return view('index');
    }

    public function sesion(){
        return view('sesion');
    }

    public function nueva_cuenta(){
        return view('nueva_cuenta');
    }

    public function procesarTarea(validadorTareas $requestT){
        // Validar los datos de la tarea
        $validated = $requestT->validated();

        $validated = $request->validated();


        DB::table('tareas')->insert([
            'nombre' => $validated['txtnombre'],
            'descripcion' => $validated['txtdescripcion'],
            'fecha' => $validated['txtfecha'],
            'hora' => $validated['txthora'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // Aquí puedes manejar la lógica después de la validación
        // Por ejemplo, guardar la tarea en la base de datos
        // Tarea::create($validated);
        $usuario = $request->input('txtnombre');
        session()->flash('exito', 'Tarea guardada correctamente');

        return to_route('rutaCreacion');
    }

    public function procesarCuenta(validadorNuevaCuenta $requestNC){
        // Validar los datos de la tarea
        $validacion = $requestNC->validated();

        session()->flash('exito', 'Cuenta creada correctamente');

        return to_route('rutaNuevaCuenta');
    }

    public function procesarInicioSesion(validadorInicioSesion $requestIS){
        // Validar los datos de la tarea
        $validacion = $requestIS->validated();

        session()->flash('exito', 'Sesión iniciada correctamente');

        return to_route('rutaInicio');
    }

}
