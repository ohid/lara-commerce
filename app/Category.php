<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products() 
    {
    	return $this->belongsToMany('App\Product', 'category_product');
    }
}
