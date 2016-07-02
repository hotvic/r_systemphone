<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['photo'];

    public function categories()
    {
        return $this->belongsToMany('App\Shop\Category')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Shop\ProductPhotos');
    }

    public function getPhotoAttribute()
    {
        return $this->photos()->first();
    }
}
