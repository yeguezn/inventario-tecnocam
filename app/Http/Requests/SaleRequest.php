<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            "nombre" => "required|max:50",
            "cedula" => ["required", "regex:/^[0-9]{7,8}$/", "size:8"],
            "banco" => "required",
            "cantidad" => "required|integer|min:1"
        ];
    }

    public function messages(){
        return [
            
            "nombre.required" => "Este campo es obligatorio.",

            "cedula.required" => "Este campo es obligatorio.",
            "cedula.size" => "La cédula debe tener 8 digitos",
            "cedula.regex" => "Número de cédula no válido.",

            "cantidad.required" => "Este campo es obligatorio.",
            "cantidad.integer" => "Este campo solo acepta números enteros.",
            "cantidad.min" => "El valor mínimo para este campo es 1.",

            "banco.required" => "Este campo es obligatorio.",

        ];
    }
}
