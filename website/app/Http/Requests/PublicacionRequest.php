<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionRequest extends FormRequest
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
        return [
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|string|max:255',
            'tipo_id' => 'required|string|max:255',
            'area_id' => 'required|string|max:255',
            'entrega' => 'required|string|max:255',
            'descripcion' => 'required|max:500',
            'ruta' => 'required|max:5120' // archivos de máximo 5MB
        ];
    }
}
