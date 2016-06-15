<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documentos';
    protected $primaryKey = 'id_tipo_documentos'; 
    protected $fillable = ['nombre'];    

}
