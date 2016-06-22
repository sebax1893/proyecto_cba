<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banda_estudiante extends Model
{
    use SoftDeletes;

    protected $table = 'banda_estudiante';
    protected $fillable = ['asiste'];
    
}
