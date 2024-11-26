<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\validadorNuevaCuenta;
use App\Http\Requests\validadorInicioSesion;
use App\Http\Requests\validadorOlvideContraseña;
use App\Mail\EnviarEnlaceRestablecimiento;

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

    public function olvideContraseña()
    {
        return view('olvidarcontraseña');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida la sesión actual
        $request->session()->invalidate();

        // Regenera el token CSRF por seguridad
        $request->session()->regenerateToken();

        // Redirige al usuario a la página deseada
        return to_route('rutaIndex'); // Cambia '/login' según tu ruta
    }

    // Panel de usuarios
    public function panelUsuarios()
    {
        // Obtener todos los usuarios registrados
        $usuarios = User::all();

        // Formateo de los registros
        $rows = $usuarios->map(function ($usuario, $index) {
            return [
                'index' => $index + 1,
                'nombre' => e($usuario->nombre),
                'apellidos' => e($usuario->apellido),
                'email' => e($usuario->email),
                'fecha_registro' => e($usuario->created_at->format('d/m/Y')),
                'rol' => e($usuario->role), // Si tienes un campo `role`
                'actions' => '
            <a href="' . route('rutaUsuarioEditar', ['id' => $usuario->id]) . '" class="btn btn-warning btn-sm">Editar</a>
            <form action="' . route('rutaUsuarioEliminar', ['id' => $usuario->id]) . '" method="POST" style="display:inline;">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        ',
            ];
        });

        return view('panel_usuarios', [
            'title' => 'Panel de Usuarios',
            'headers' => [
                '#',
                'Nombre',
                'Apellidos',
                'Correo Electrónico',
                'Fecha de Registro',
                'Rol',
                'Acciones'
            ],
            'rows' => $rows,
        ]);
    }

    public function procesoOlvideContraseña(validadorOlvideContraseña $requestOC)
    {
        // Verificar si el usuario existe
        $usuario = User::where('email', $requestOC->input('username'))->first();

        if (!$usuario) {
            return redirect()->back()->withErrors(['username' => 'Usuario no encontrado']);
        }

        // Generar un token para restablecimiento de contraseña
        $token = Password::createToken($usuario);

        // Crear un enlace para restablecer contraseña
        $resetUrl = route('rutaResetContraseña', ['token' => $token, 'email' => $usuario->email]);

        // Enviar correo al usuario
        Mail::to($usuario->email)->send(new EnviarEnlaceRestablecimiento($resetUrl));

        // Mensaje de éxito
        session()->flash('exito', 'Se envió el correo con el enlace para cambiar la contraseña');

        // Redirigir al inicio de sesión
        return to_route('rutaInicioSesion');
    }

    // Almacenar usuario
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

    public function edit($id)
    {
        $usuario = DB::table('cuentas')->where('id', $id)->first();

        if (!$usuario) {
            return redirect()->back()->withErrors(['error' => 'No se encontró el usuario']);
        }

        return view('editarUsuarios', compact('usuario'));
    }

    public function update(ActualizarUsuario $request, $id)
    {
        // Buscar al usuario por ID
        $usuario = DB::table('usuarios')->where('id', $id)->first();

        if (!$usuario) {
            return redirect()->back()->withErrors(['error' => 'No se encontró el usuario']);
        }

        // Si se desea cambiar la contraseña
        if ($request->filled('txtpassword') && $request->filled('txtconfirmarcontraseña')) {
            // Verificar si la contraseña actual es correcta
            if (!Hash::check($request->input('txtpassword_actual'), $usuario->password)) {
                return redirect()->back()->withErrors(['txtpassword_actual' => 'La contraseña actual es incorrecta.']);
            }

            // Encriptar y actualizar la nueva contraseña
            $password = bcrypt($request->input('txtpassword'));

            DB::table('usuarios')->where('id', $id)->update([
                'nombre' => $request->input('txtnombre'),
                'apellido' => $request->input('txtapellido'),
                'email' => $request->input('txtgmail'),
                'password' => $password,  // Actualizar contraseña
            ]);
        } else {
            // Si no se cambia la contraseña, solo actualizar los demás campos
            DB::table('usuarios')->where('id', $id)->update([
                'nombre' => $request->input('txtnombre'),
                'apellido' => $request->input('txtapellido'),
                'email' => $request->input('txtgmail'),
            ]);
        }

        // Mostrar un mensaje de éxito
        session()->flash('exito', 'Se actualizó el usuario');

        // Redirigir a la ruta de inicio o la vista que prefieras
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

        return to_route('rutaPanelUsuarios');
    }

}
