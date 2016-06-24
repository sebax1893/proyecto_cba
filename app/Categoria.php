<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categoria extends Model
{
	use SoftDeletes;

    protected $table = 'categorias';
	protected $primaryKey = 'id_categorias';
	protected $fillable = ['nombre'];

	protected $dates = ['deleted_at'];

	/**
    * Relación One-To-Many: categoria tiene muchas bandas
    */
    public function bandas()
  	{
    	return $this->hasMany('CBA\Banda', 'id_bandas', 'id_categorias');
  	}
}
