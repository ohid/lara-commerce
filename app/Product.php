<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'short_title', 'offer', 'description', 'price', 'old_price', 'slider', 'slider_img'];

    public function categories() 
    {
    	return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function tags() 
    {
    	return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public static function getPhoto($id) 
    {
        return static::where(compact('id'))->first();
    }

    public function getOldPriceAttribute($old_price) 
    {
    	if($old_price == '0.00') {
			return 'Not given';
    	} else {
			return $old_price;
    	}
    }

    public function getTagListAttribute() 
    {
        return $this->tags->lists('id');
    }

    // public function newTAgs($tags) 
    // {
    //     foreach($product->tags as $tags) {
    //             {{ $tags->id }}
    //     }
    //         // @endforeach
    // }

}
