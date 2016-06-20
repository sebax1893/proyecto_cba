<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banda extends Model
{
	use SoftDeletes;

    protected $table = 'bandas';
    protected $primaryKey = 'id_bandas';
    protected $fillable = ['nombre','representante','contacto_representante','correo_representante','director','contacto_director','correo_director'];

    protected $dates = ['deleted_at'];
    
    /**
     * Bandas que pertenecen a instituciones
     */
    public function institucions()
    {
        return $this->belongsToMany('CBA\Institucion', 'banda_institucion', 'id_bandas', 'id_institucions');
    }

}
