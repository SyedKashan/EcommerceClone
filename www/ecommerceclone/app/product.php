<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // protected $table = 'products';
    // protected $primarykey = 'id';
    // public $timestamps = true;

    public function attributes(){

        return $this->hasMany('App\ProductAttributes','productid');
    }
}
