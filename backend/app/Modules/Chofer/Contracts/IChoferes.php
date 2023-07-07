<?php 

namespace App\Modules\Chofer\Contracts;

use App\Models\Chofer;

interface IChoferes {
    //AQUI VAN TODASLAS FUNCIONALIDADES DEL REPSOITORIO
    public function getChoferes();
    public function insertarChofer($data);
    public function buscarChofer($data);
    public function buscarChoferParaActualizar($data);
    public function actualizarChofer(Chofer $chofer, array $data);
    public function eliminarChofer($data);

}



?>