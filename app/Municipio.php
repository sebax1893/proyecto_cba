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
    * Relación One-To-Many institución tiene muchos municipios
    */
    public function institucions()
  	{
    	return $this->hasMany('CBA\Institucion', 'id_institucions', 'id_municipios');
  	}

	// public function institucions()
 //    {
 //        return $this->belongsTo('CBA\Institucion', 'id_institucions', 'id_municipios');
 //    }    
}
