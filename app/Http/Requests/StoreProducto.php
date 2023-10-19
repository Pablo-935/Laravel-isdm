<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducto extends FormRequest
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
            'imagen' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ];
    }

    public function messages():array
    {
        return[
            'imagen.required' => 'La imagen es requerida',
            'nombre.required' => 'El nombre es requerido',
            'descripcion' => 'La descripción es requerida',
            'precio.required' => 'El precio es requerido',
        ];
    }
}
