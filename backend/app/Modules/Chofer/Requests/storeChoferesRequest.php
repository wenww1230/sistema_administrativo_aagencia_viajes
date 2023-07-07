<?php
namespace App\Modules\Chofer\Requests;

use App\Http\Requests\WebApiRequest;

class GetChoferesRequest extends WebApiRequest
{
    public function authorize() {

        return true;
    }
   
    public function rules(){
        return [
            'nombre' => 'required', 
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'dni' => 'required',
            'numero_licencia' => 'required'
        ];
    }
}

?>