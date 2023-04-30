<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';
    public $timestamps = false;

    /*
        para buscar por id, tabla::find(id) == esto devuelve el elemento por id

        para modificar guardo en una variable x ej $paciente = paciente::find(1)
        $paciente->nombre = 'raul'

        ahi modifique a nivel de memoria falta subir a base de datos, falta esot $paciente->save()
    
    */
}
