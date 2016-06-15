<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    protected $table = 'subregions';
    protected $primaryKey = 'id_subregions';
    protected $fillable = ['nombre'];    
    public $timestamps = false;
    
}
