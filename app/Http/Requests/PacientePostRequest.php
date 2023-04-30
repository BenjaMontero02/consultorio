<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => ['required'],
            'apellido' => ['required'],
            'dni' => ['required', 'min:8', 'max:8'],
            'cuil' => ['nullable'],
            'fecha_nac' => ['nullable'],
            'direccion' => ['nullable'],
            'telefono' => ['nullable'],
            'ult_visita' => ['nullable'],
            'obra_social' => ['nullable']
        ];
    }
}
