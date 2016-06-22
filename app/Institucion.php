<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
	use SoftDeletes;

    protected $table = 'institucions';
    protected $primaryKey = 'id_institucions';
	protected $fillable = ['id_municipios', 'nombre','resenha'];

    protected $dates = ['deleted_at'];
    
    /**
    * Relación One-To-Many institución tiene muchos municipios
    */
    public function municipios()
    {
        return $this->belongsTo('CBA\Municipio', 'id_municipios');
    }

    // /**
    //  * Las instituciones que pertenecen a bandas.
    //  */
    // public function estudiantes()
    // {
    //     return $this->belongsToMany('CBA\Banda');
    // }
}
