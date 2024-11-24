<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'txtnombre' => 'required|string|max:255',
            'txtapellido' => 'required|string|max:255',
            'txtgmail' => 'required|email|max:255',
            'txtpassword' => 'nullable|string|min:8|confirmed',  // Si se proporciona, se valida
            'txtconfirmarcontraseña' => 'nullable|string|min:8', // Confirmación de la contraseña nueva
            'txtpassword_actual' => 'required_with:txtpassword|string|min:8', // Solo se requiere si se cambia la contraseña
        ];
    }

    public function messages()
    {
        return [
            'txtpassword.confirmed' => 'Las contraseñas no coinciden.',
            'txtpassword_actual.required_with' => 'La contraseña actual es requerida cuando se cambia la contraseña.',
        ];
    }
}
