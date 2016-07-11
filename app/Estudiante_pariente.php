<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Estudiante_pariente extends Model
{
    protected $table = 'estudiante_pariente';
    protected $fillable = ['es_representante'];

}
