<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Pariente extends Model
{
	
    protected $table = 'parientes';
    protected $primaryKey = 'id_parientes';
    public $timestamps = false;
    protected $fillable = ['id_parentescos', 'nombre', 'telefono'];    

    // /**
    //  * Los parientes que pertenecen a estudiantes.
    //  */
    // public function estudiantes()
    // {
    //     return $this->belongsToMany('CBA\Estudiante');
    // }
}
