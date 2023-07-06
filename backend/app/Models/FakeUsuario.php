<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeUsuario extends Model
{
    use HasFactory;
    protected $fillable= ["nombre", "descripcion"];
    public $timestamps = false;
    protected $table="FakeUsuarios";
}   
