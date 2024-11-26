<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarea;  // Importar el modelo Tarea
use Carbon\Carbon;
use App\Http\Requests\validadorTareas;

class TareasController extends Controller
{
    // Crear nueva tarea
    public function create()
    {
        return view('creacion_tareas');
    }

    // Mostrar tareas del usuario autenticado
    public function panel()
    {
        $usuario = Auth::user(); // Usuario autenticado
        $tareas = $usuario->tareas; // Relación con las tareas

        // Formateo de los registros
        $rows = $tareas->map(function ($tarea, $index) {
            return [
                'index' => $index + 1,
                'nombre' => e($tarea->nombre),
                'descripcion' => e($tarea->descripcion),
                'fecha' => e(Carbon::parse($tarea->fecha)->format('d/m/Y')),
                'hora' => e($tarea->hora),
                'actions' => '
                <a href="' . route('rutaEditarTarea', ['id' => $tarea->id]) . '" class="btn btn-warning btn-sm">Editar</a>
                <form action="' . route('rutaEliminarTarea', ['id' => $tarea->id]) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            ',
            ];
        });

        return view('panel', [
            'title' => 'Panel de Tareas',
            'headers' => ['#', 'Nombre', 'Descripción', 'Fecha', 'Hora', 'Acciones'],
            'rows' => $rows,
        ]);
    }

    // Almacenar tarea en la base de datos
    public function storeTareas(validadorTareas $requestT)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('rutaInicioSesion')->withErrors(['error' => 'Debe iniciar sesión para registrar una tarea']);
        }

        // Crear la tarea asociada al usuario autenticado
        $tarea = new Tarea([
            'nombre' => $requestT->input('txtnombre'),
            'descripcion' => $requestT->input('txtdescripcion'),
            'fecha' => $requestT->input('txtfecha'),
            'hora' => $requestT->input('txthora'),
            'user_id' => Auth::id(),
        ]);

        // Guardar la tarea en la base de datos
        $tarea->save();

        // Mensaje de éxito
        session()->flash('exito',
            'Se registró la tarea: ' . $requestT->input('txtnombre')
        );

        // Redirigir a la ruta del panel o a otra página
        return redirect()->route('rutaPanel');
    }

    // Mostrar el formulario de edición de la tarea
    public function edit($id)
    {
        // Obtener la tarea por su ID
        $tarea = Tarea::findOrFail($id);

        // Verificar si la tarea pertenece al usuario autenticado
        if ($tarea->user_id !== Auth::id()) {
            return redirect()->route('rutaInicio')->with('error', 'No tienes permiso para editar esta tarea.');
        }

        // Mostrar la vista de edición con la tarea cargada
        return view('editarTarea', compact('tarea'));
    }

    // Actualizar tarea
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'txtnombre' => 'required|string|max:255',
            'txtdescripcion' => 'required|string',
            'txtfecha' => 'required|date',
            'txthora' => 'required|date_format:H:i',
        ]);

        // Obtener la tarea por su ID
        $tarea = Tarea::findOrFail($id);

        // Verificar si la tarea pertenece al usuario autenticado
        if ($tarea->user_id !== Auth::id()) {
            return redirect()->route('rutaInicio')->with('error', 'No tienes permiso para editar esta tarea.');
        }

        // Actualizar los datos de la tarea
        $tarea->update([
            'nombre' => $request->input('txtnombre'),
            'descripcion' => $request->input('txtdescripcion'),
            'fecha' => $request->input('txtfecha'),
            'hora' => $request->input('txthora'),
        ]);

        // Mensaje de éxito
        session()->flash('exito',
            'Tarea actualizada correctamente.'
        );

        return to_route('rutaPanel');  // Redirige al panel de tareas
    }

    // Eliminar tarea
    public function destroy($id)
    {
        // Obtener la tarea por su ID
        $tarea = Tarea::findOrFail($id);

        // Verificar si la tarea pertenece al usuario autenticado
        if ($tarea->user_id !== Auth::id()
        ) {
            return redirect()->route('rutaInicio')->with('error', 'No tienes permiso para eliminar esta tarea.');
        }

        // Eliminar la tarea
        $tarea->delete();

        // Mensaje de éxito
        session()->flash('exito', 'Tarea eliminada correctamente.');

        return to_route('rutaPanel');
    }
}
