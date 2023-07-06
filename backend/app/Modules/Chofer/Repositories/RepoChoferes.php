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
    }
    public function buscarChofer($data){
        $choferes = Chofer::find($data);
    }
    public function actualizarChofer($data){
        $chofer = Chofer::find($data);
        if($chofer){
            $chofer->update($data);
        }

    }
    public function eliminarChofer($data){
        $chofer= Chofer::find($data);
        if($chofer){
            $chofer->update($data);
        }
    }    
}

?>