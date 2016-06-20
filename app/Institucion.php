<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
	use SoftDeletes;

    protected $table = 'institucions';
    protected $primaryKey = 'id_instotucions';
	protected $fillable = ['nombre','resenha'];

    protected $dates = ['deleted_at'];
    
    /**
     * Las instituciones que pertenecen a bandas.
     */
    public function estudiantes()
    {
        return $this->belongsToMany('CBA\Banda');
    }
}
