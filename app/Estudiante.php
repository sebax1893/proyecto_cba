<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Estudiante extends Model
{
    
    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiantes';
    protected $fillable = ['id_tipo_documentos','id_eps', 'id_municipios', 'numeroIdentificacion','nombres','apellidos','edad','fechaNacimiento','direccion','barrio','telefono','celular','correo','observaciones','foto','activo'];
    
    public function setFotoAttribute($foto)
    {
        if (!empty($foto)) {            
            $file = $foto;
            
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $this->attributes['foto'] = $name;

            $file->move(public_path().'/images/', $name);
        }
        
    } 

    /**
     * Estudiantes que pertenecen a parientes
     */
    public function parientes()
    {
        return $this->belongsToMany('CBA\Pariente', 'estudiante_pariente', 'id_estudiantes', 'id_parientes')
        ->withPivot('es_representante');
    }

    /**
     * Estudiantes que pertenecen a bandas
     */
    public function bandas()
    {
        return $this->belongsToMany('CBA\Banda', 'banda_estudiante', 'id_estudiantes', 'id_bandas')
        ->withPivot('asiste');        
    }

    /**
    * Relación One-To-Many hay muchos estudiantes en una eps
    */
    public function eps()
    {
        return $this->belongsTo('CBA\Eps', 'id_eps');
    }

    /**
    * Relación One-To-Many hay muchos estudiantes en un municipio
    */
    public function municipios()
    {
        return $this->belongsTo('CBA\Municipio', 'id_municipios');
    }

    /**
    * Relación One-To-Many hay muchos estudiantes en un tipo de documento
    */
    public function tipo_documentos()
    {
        return $this->belongsTo('CBA\TipoDocumento', 'id_tipo_documentos');
    }
}
