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
           // 'source_id' => 'required|string'
           //'workgroup_name' => 'required',
           //'whatsapp_api_id' => 'required'
        ];
    }
}

?>