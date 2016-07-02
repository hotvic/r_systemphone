<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cart()
    {
        return $this->belongsTo('App\Shop\Cart');
    }

    public function address()
    {
        return $this->belongsTo('App\Shop\Address');
    }
}
