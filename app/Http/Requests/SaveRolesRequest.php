<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'display_name' => 'required'
        ];

        if ($this->method === 'POST') {
            $rules['name'] = 'required|unique:roles';
        }
        
        return $rules;
    }

    //regresar los mensjes
    public function messages()
    {
        return [   //array de mensajes
                'display_name.required' => 'El nombre del rol es obligatorio',
                'name.required' => 'El identificador del rol es obligatorio',
                'name.unique' => 'El identificador del rol ya ha sido registrado'
            ] ;
    } 
}
