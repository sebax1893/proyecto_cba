<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class TipoBanda extends Model
{
    protected $table = 'tipo_bandas';
    protected $primaryKey = 'id_tipo_bandas';
    protected $fillable = ['nombre'];    

}
