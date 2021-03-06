<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSalasRequest extends FormRequest
{
    /**
     * Autorizamos la validacion
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Especifimamos las reglas de validacion
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:99999999999',
            'equipamiento' => 'required|string|max:99999999999'
        ];
    }

    /**
     * Especificamos los mensajes para las reglas de validacion
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'Este campo es obligatorio.',
            'nombre.string' => 'El nombre debe de ser una cadena de caracteres.',
            'nombre.max' => 'El maximo de caracteres es 99999999999',
            'equipamiento.required' => 'El campo es obligatorio.',
            'equipamiento.string' => 'El equipamiento debe de ser una cadena de caracteres.',
            'equipamiento.max' => 'El maximo de caracteres es 99999999999'
        ];
    }
}
