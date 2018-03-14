<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateActividadAjaxFormRequest extends CreateActividadFormRequest
{
    /**
     * Especificamos las reglas de validacion asincrona.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        if($this->exists('nombre')){
            $rules['nombre'] = $this->validarNombre();
        }
        if($this->exists('objetivos')) {
            $rules['objetivos'] = $this->validarObjetivos();
        }
        if($this->exists('intensidad')) {
            $rules['intensidad'] = $this->validarIntensidad();
        }
        if($this->exists('duracion')) {
            $rules['duracion'] = $this->validarDuracion();
        }
        if($this->exists('descripcion')) {
            $rules['descripcion'] = $this->validarDescripcion();
        }


        return $rules;
    }

    /**
     * Decimos que salte las validaciones cuando falle.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'nombre' => $errors->get('nombre'),
            'objetivos' => $errors->get('objetivos'),
            'intensidad' => $errors->get('intensidad'),
            'duracion' => $errors->get('duracion'),
            'descripcion' => $errors->get('descripcion'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
