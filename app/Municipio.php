<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'id_municipios';
    protected $fillable = ['nombre'];

    public $timestamps = false;
	
    /**
    * Relación One-To-Many: hay muchas instituciones en un municipio
    */
    public function institucions()
  	{
    	return $this->hasMany('CBA\Institucion', 'id_institucions', 'id_municipios');
  	}

    /**
    * Relación One-To-Many hay muchos municipios en una subregión
    */
    public function subregions()
    {
        return $this->belongsTo('CBA\Subregion', 'id_subregions');
    }

	// public function institucions()
 //    {
 //        return $this->belongsTo('CBA\Institucion', 'id_institucions', 'id_municipios');
 //    }    
}
