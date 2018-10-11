<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primarykey = 'id';
    public $timestamps = true;

    public function products(){
        return $this->hasMany(Product::class);
    }
}
