<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'description', 'price', 'in_stock'
    ];

    protected $appends = ['photo'];

    public function categories()
    {
        return $this->belongsToMany('App\Shop\Category')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Shop\ProductPhoto');
    }

    public function getPhotoAttribute()
    {
        return $this->photos()->first();
    }
}
