<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


// Importa el modelo Tarea
use App\Models\Tarea;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Especificar la tabla
    protected $table = 'cuentas';

    // Campos rellenables
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // Ocultar campos sensibles
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación con el modelo Tarea.
     * Un usuario puede tener muchas tareas.
     */
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'user_id');
    }

    public function esAdministrador()
    {
        return $this->rol === 'admin'; // Asegúrate de que 'rol' esté bien asignado y exista en la tabla
    }
}
