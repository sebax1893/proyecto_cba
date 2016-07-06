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
    public function parientes()
    {
        return $this->hasMany('CBA\Parientes', 'id_parientes', 'id_parentescos');
    }

}
