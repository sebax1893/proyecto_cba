<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
	use SoftDeletes;

    protected $table = 'institucions';
    protected $primaryKey = 'id_institucions';
	protected $fillable = ['id_municipios', 'nombre', 'direccion', 'telefono'];

    protected $dates = ['deleted_at'];
    
    /**
    * Relación One-To-Many: hay muchas instituciones en un municipio
    */
    public function municipios()
    {
        return $this->belongsTo('CBA\Municipio', 'id_municipios');
    }

    /**
    * Relación One-To-Many: intitucion tiene muchas bandas
    */
    public function institucions()
    {
        return $this->hasMany('CBA\Banda', 'id_bandas', 'id_institucions');
    }
}
