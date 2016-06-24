<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class TipoBanda extends Model
{
    protected $table = 'tipo_bandas';
    protected $primaryKey = 'id_tipo_bandas';
    protected $fillable = ['nombre'];    

    /**
    * Relación One-To-Many: tipo de banda tiene muchas bandas
    */
    public function bandas()
  	{
    	return $this->hasMany('CBA\TipoBanda', 'id_bandas', 'id_tipo_bandas');
  	}
}
