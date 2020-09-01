<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    
    protected $primaryKey = 'pro_id';
    public function type_product(){
        return $this->belongTo('App\Type_product');
    }

    // public function 
}
