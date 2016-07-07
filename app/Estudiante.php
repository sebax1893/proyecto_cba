<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Estudiante extends Model
{
	use SoftDeletes;

    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiantes';
    protected $fillable = ['id_tipo_documentos','id_eps', 'id_municipios', 'numeroIdentificacion','nombres','apellidos','edad','fechaNacimiento','direccion','barrio','telefono','celular','correo','observaciones','foto','activo'];
    protected $dates = ['deleted_at'];

    // public function getDates()
    // {
    //     return ['created_at', 'updated_at', 'fechaNacimiento'];
    // }
    
    // public function setDobAttribute($value)
    // {
    //     $this->attributes['fechaNacimiento'] = Carbon::createFromFormat('d/m/Y', $value);
    // }

    /**
     * Estudiantes que pertenecen a parientes
     */
    public function parientes()
    {
        return $this->belongsToMany('CBA\Pariente', 'estudiante_pariente', 'id_parientes', 'id_estudiantes')
        ->withPivot('es_representante');;
    }

    /**
     * Estudiantes que pertenecen a bandas
     */
    public function bandas()
    {
        return $this->belongsToMany('CBA\Banda', 'banda_estidiante', 'id_parientes', 'id_estudiantes')
        ->withPivot('asiste');        
    }
}
