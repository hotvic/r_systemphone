<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];

    protected $appends = ['url'];

    public static function getStorageDir($product=null)
    {
        $append = '';

        if ($product !== null)
            $append = $product->slug;

        return storage_path('app/product-photos/' .  $append);
    }

    public function product()
    {
        return $this->belongsTo('App\Shop\Product');
    }

    public function getUrlAttribute()
    {
        return route('shop.picture', ['type' => 'product-photo', 'id' => $this->id]);
    }
}
