<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address1', 'address2', 'address3', 'postal_code', 'city', 'state'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
