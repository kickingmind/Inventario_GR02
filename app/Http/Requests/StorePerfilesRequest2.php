<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfilesRequest2 extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'nombre' => 'required|unique:Perfil'
        ];
    }



    public function messages()
    {
        return [
          'nombre.required' => 'Campos vacios, debes colocar un nombre',
          'nombre.unique:Perfil' => 'El nombre ya está en uso, coloca otro nombre.'

        ];
    }





}
