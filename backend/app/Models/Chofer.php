<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $table = 'choferes';
    protected $fillable = [ 'nombre', 'ap_paterno', 'ap_materno', 'dni', 'numero_licencia'];
    protected $primaryKey = 'id_chofer'; 
    public $timestamps = false;


}
