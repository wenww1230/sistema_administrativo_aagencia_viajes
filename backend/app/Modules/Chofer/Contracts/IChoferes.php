<?php 

namespace App\Modules\Chofer\Contracts;

interface IChoferes {
    //AQUI VAN TODASLAS FUNCIONALIDADES DEL REPSOITORIO
    public function getChoferes();
    public function insertarChofer($data);
    public function buscarChofer($data);
    public function actualizarChofer($data);
    public function eliminarChofer($data);

}



?>