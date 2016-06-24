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
    * Relación One-To-Many subregión tiene muchos municipios
    */
    public function municipios()
  	{
    	return $this->hasMany('CBA\Municipio', 'id_municipios', 'id_subregions');
  	}
}
