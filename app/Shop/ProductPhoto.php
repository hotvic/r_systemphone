<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Shop\Product');
    }
}
