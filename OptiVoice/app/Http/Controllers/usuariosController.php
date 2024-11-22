<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\validadorNuevaCuenta;
use App\Http\Requests\validadorInicioSesion;

class usuariosController extends Controller
{

    // Página de inicio de sesión
    public function inicioSesion()
    {
        return view('inicioSesion');
    }

    // Página para crear una nueva cuenta
    public function nuevaCuenta()
    {
        return view('nueva_cuenta');
    }

    // Panel de usuarios
    public function panelUsuarios()
    {
        $usuario = DB::table('cuentas')->get();
        return view('panel_usuarios', compact('usuario'));
    }

    // Almacenar tarea
    public function storeUsuarios(validadorNuevaCuenta $requestU)
    {
        DB::table('cuentas')->insert([
            "nombre" => $requestU->input('txtnombre'),
            "apellido" => $requestU->input('txtapellido'),
            "email" => $requestU->input('txtgmail'),
            "password" => bcrypt($requestU->input('txtcontraseña')), // Encriptar la contraseña
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $usuario = $requestU->input('txtnombre');
        session()->flash('exito', 'Se registro el usuario: ' . $usuario);

        return to_route('rutaInicioSesion');
    }

    public function procesoInicioSesion(validadorInicioSesion $request)
    {
        // Verificar si el usuario existe
        $usuario = User::where('email', $request->input('username'))->first();

        if (!$usuario) {
            return redirect()->back()->withErrors(['username' => 'Usuario no encontrado']);
        }

        // Validar la contraseña
        if (!Hash::check($request->input('password'), $usuario->password)) {
            return redirect()->back()->withErrors(['password' => 'Contraseña incorrecta']);
        }

        // Autenticar al usuario
        Auth::login($usuario);
        session()->flash('exito', 'Bienvenido, ' . $usuario->nombre);

        // Redirigir al dashboard
        return to_route('rutaInicio');
    }

    public function edit($id){
        $usuario = DB::table('usuarios')->where('id', $id)->first();
        if (!$usuario) {
            return redirect()->back()->withErrors(['error' => 'No se encontró el usuario']);
        }
        return view('editarUsuario', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $updateUsuario = DB::table('usuarios')->where('id', $id)->update([
            "nombre" => $request->input('txtnombre'),
            "apellido" => $request->input('txtapellido'),
            "gmail" => $request->input('txtgmail'),
            "pasword" => $request->input('txtpassword'),
        ]);

        if ($updateUsuario) {
            session()->flash('exito', 'Se actualizó el usuario');
        } else {
            session()->flash('error', 'No se pudo actualizó el usuario');
        }

        return to_route('rutaInicio');
    }

    public function destroy($id)
    {
        $deleteUsuario = DB::table('usuarios')->where('id', $id)->delete();

        if ($deleteUsuario) {
            session()->flash('exito', 'Se eliminó el usuario');
        } else {
            session()->flash('error', 'No se pudo eliminar el usuario');
        }

        return to_route('rutaInicio');
    }

}
