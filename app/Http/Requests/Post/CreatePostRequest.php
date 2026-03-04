<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'placa' => 'required|string|max:6',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:255',
            'anio' => 'required|numeric|max:2026|min:1900',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'documento' => 'required|string|max:8',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'created_at' => 'required|date',
        ];
    }
}
