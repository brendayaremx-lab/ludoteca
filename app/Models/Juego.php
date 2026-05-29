<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $fillable = [
        'nombre',
        'dificultad',
        'edad_recomendada',
        'numero_jugadores',
        'imagen'
    ];
}