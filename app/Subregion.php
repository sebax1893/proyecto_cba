<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    protected $table = 'subregions';
    protected $primaryKey = 'id_subregions';
    protected $fillable = ['nombre'];    
    public $timestamps = false;
    
    /**
    * Relación One-To-Many hay muchos municipios en una subregión
    */
    public function institucions()
  	{
    	return $this->hasMany('CBA\Municipio', 'id_municipios', 'id_institucions');
  	}
}
