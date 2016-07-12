<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{

    protected $table = 'institucions';
    protected $primaryKey = 'id_institucions';
	protected $fillable = ['id_municipios', 'nombre', 'direccion', 'telefono'];

    /**
    * Relación One-To-Many: hay muchas instituciones en un municipio
    */
    public function municipios()
    {
        return $this->belongsTo('CBA\Municipio', 'id_municipios');
    }

    /**
    * Relación One-To-Many: categoria tiene muchas bandas
    */
    public function bandas()
    {
        return $this->hasMany('CBA\Banda', 'id_bandas', 'id_institucions');
    }
}
