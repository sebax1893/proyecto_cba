<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banda extends Model
{
	use SoftDeletes;

    protected $table = 'bandas';
    protected $primaryKey = 'id_bandas';
    protected $fillable = ['id_institucions', 'id_categorias', 'id_tipo_bandas', 'nombre','representante','contacto_representante','correo_representante','director','contacto_director','correo_director', 'resenha'];

    protected $dates = ['deleted_at'];
    
    /**
    * Relación One-To-Many hay muchas bandas en una institución
    */
    public function institucions()
    {
        return $this->belongsTo('CBA\Institucion', 'id_institucions');
    }

    /**
    * Relación One-To-Many hay muchas bandas en una categoria
    */
    public function categorias()
    {
        return $this->belongsTo('CBA\Categoria', 'id_categorias');
    }

    /**
    * Relación One-To-Many hay muchas bandas en un tipo de banda
    */
    public function tipo_bandas()
    {
        return $this->belongsTo('CBA\TipoBanda', 'id_tipo_bandas');
    }

}
