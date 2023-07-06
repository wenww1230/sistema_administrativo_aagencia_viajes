<?php

namespace App\Repository\UsuarioSistema;

use App\Repository\BaseRepository;
use App\Models\UsuarioSistema;

class UsuarioSistemaRepository extends BaseRepository
{
    public function getModel()
    {
        return new UsuarioSistema(); /* del modelo */
    }
}

?> 