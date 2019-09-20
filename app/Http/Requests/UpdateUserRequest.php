<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//false, se cambio a true porque se usaran politicas de acceso para esto
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //reglas de validacion
        $rules = [
            'name' => 'required',
            'email' => ['required', 
                        Rule::unique('users')->ignore($this->route('user')->id)]
                ];

        //valida si el campo contraseña tiene informacion
        if ($this->filled('password')) 
        {
            //agregar la contraseña al array de reglas de validacion
            $rules['password'] = ['confirmed', 'min:6'];       
        } 

        return $rules;  
    }
}
