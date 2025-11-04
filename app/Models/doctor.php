<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\doctor as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'coddoctor',
        'nombre',
        'apPaterno',
        'apMaterno',
        'celula',
        'telefono',
        'dirreccion',
    ];
}
