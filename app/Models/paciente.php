<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory; 
    protected $fillable = [
        'codpaciente',
        'nombre',
        'apPaterno',
        'apMaterno',
        'celula',
        'telefono',
        'fechanaci',
        'edad',
        'direccion',
    ];

}
