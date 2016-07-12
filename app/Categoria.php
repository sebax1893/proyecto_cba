<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{

  protected $table = 'categorias';
	protected $primaryKey = 'id_categorias';
	protected $fillable = ['nombre'];

	/**
    * Relación One-To-Many: categoria tiene muchas bandas
    */
    public function bandas()
  	{
    	return $this->hasMany('CBA\Banda', 'id_bandas', 'id_categorias');
  	}
}
