<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Shop\Product')->withTimestamps();
    }
}
