<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Pariente extends Model
{
	
    protected $table = 'parientes';
    protected $primaryKey = 'id_parientes';
    public $timestamps = false;
    protected $fillable = ['id_parentescos', 'nombre', 'telefono'];    

    /**
     * Los parientes que pertenecen a estudiantes.
     */
    public function estudiantes()
    {
        return $this->belongsToMany('CBA\Estudiante', 'estudiante_pariente', 'id_parientes', 'id_estudiantes')
        ->withPivot('es_representante');
    }

    /**
    * Relación One-To-Many: hay muchos parientes en un parentesco
    */
    public function parentescos()
    {
        return $this->belongsTo('CBA\Parentesco', 'id_parentescos');
    }
}
