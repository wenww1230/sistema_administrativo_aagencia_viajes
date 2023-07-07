<?php

namespace App\Modules\Chofer\Repositories;

use App\Models\Chofer;
use App\Modules\Chofer\Contracts\IChoferes ;

class RepoChoferes implements IChoferes
{

    public function getChoferes(){
        $choferes = Chofer::all();
        return $choferes;
    }
    public function insertarChofer($data){
        $choferes = Chofer::create($data);
        return $choferes;
    }
    public function buscarChofer($data){
        $chofer = Chofer::where('id_chofer',$data)->get();
        return $chofer;
    }
    public function buscarChoferParaActualizar($id)
    {
        return Chofer::find($id);
    }
    public function actualizarChofer($data, array $datos)
    {
        $chofer = Chofer::find($data);
    
        if ($chofer) {
            $chofer->fill($datos);
            $chofer->save();
            return $chofer;
        }
    
        return null;
    }
    
    public function eliminarChofer($data)
    {
        $chofer = Chofer::find($data);
        if ($chofer) {
            $chofer->delete();
        }
    }
}

?>