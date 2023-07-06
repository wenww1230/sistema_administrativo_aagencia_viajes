<?php

namespace App\Repository\Chofer;

use App\Repository\BaseRepository;
use App\Models\Chofer;

class ChoferRepository extends BaseRepository
{
    public function getModel()
    {
        return new Chofer();
    }
/*     public function __construct(Chofer $chofer)
    {
        parent::__construct($chofer);
    }

    // Agrega métodos adicionales específicos para el modelo Chofer si los necesitas.

    public function almacenar(array $data)
    {
        return $this->model->create($data);
    }

    public function actualizar($id, array $data)
    {
        $model = $this->find($id);

        if ($model) {
            $model->fill($data);
            $model->save();

            return $model;
        }

        return null;
    }
    public function mostrarChoferes()
    {
        return $this->model->all();
    }

    public function eliminar($id)
    {
    $model = $this->find($id);

    if ($model) {
        $model->delete();
        return true;
    }

    return false;
} */
    
}
