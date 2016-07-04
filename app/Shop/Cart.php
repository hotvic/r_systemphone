<?php

namespace App\Shop;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'items' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'items', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
