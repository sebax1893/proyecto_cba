<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
	use SoftDeletes;

    protected $table = 'estudiantes';
    protected $primaryKey = 'id_estudiantes';
    protected $fillable = ['id_tipo_documentos','id_eps','numeroIdentificacion','nombres','apellidos','edad','fechaNacimiento','direccion','municipio','barrio','telefono','celular','correo','observaciones','foto','activo'];
    protected $dates = ['deleted_at'];
    
    /**
     * Estudiantes que pertenecen a parientes
     */
    public function parientes()
    {
        return $this->belongsToMany('App\Pariente', 'estudiante_pariente', 'id_estudiantes', 'id_parientes');
    }
}
