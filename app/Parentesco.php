<?php

namespace CBA;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = 'parentescos';
    protected $primaryKey = 'id_parentescos';
    protected $fillable = ['nombre'];    
    public $timestamps = false;

    /**
     * The products that belong to the shop.
     */
    public function estudiantes()
    {
        return $this->belongsToMany('App\Estudiante');
    }

}
