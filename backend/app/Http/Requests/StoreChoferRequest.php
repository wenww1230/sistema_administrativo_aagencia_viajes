<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChoferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /* return false; */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //valiaciones
            'nombre' => 'required|max:8',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'dni' => 'required',
            'numero_licencia' => 'required'
        ];
    }
}
