<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioSistema extends Model
{
    /* use HasFactory; */
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
}
