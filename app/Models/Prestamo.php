<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'nombre_cliente',
        'numero_personas',
        'juegos',
        'codigo_confirmacion',
        'estado'
    ];

    protected $casts = [
        'juegos' => 'array',
    ];
}
