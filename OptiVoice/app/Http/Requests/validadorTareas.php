<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorTareas extends FormRequest
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
            'txtdescripcion' => 'required|string|max:1000',
            'txtfecha' => 'required|date_format:Y-m-d|after:today',
            'txthora' => 'required|date_format:H:i',
        ];
    }
}
