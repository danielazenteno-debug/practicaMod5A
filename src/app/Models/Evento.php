<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'eventos';

    /**
     * Los atributos que son asignables de forma masiva (Mass Assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'ubicacion',
    ];
}