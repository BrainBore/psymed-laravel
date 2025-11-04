<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    use HasFactory;
    protected $fillable=[
        'dia',
        'active',
        'mañanainicio',
        'mañanafin',
        'tardeinicio',
        'tardefin',
        'user_id'
    ];
}
