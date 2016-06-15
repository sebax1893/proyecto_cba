<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipios';
    protected $fillable = ['nombre'];

    public $timestamps = false;
    
}
