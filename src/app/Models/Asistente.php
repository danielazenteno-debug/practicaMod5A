<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'asistentes';

    /**
     * Atributos asignables de forma masiva (Mass Assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'evento_id',
    ];
}