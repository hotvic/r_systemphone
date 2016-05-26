<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excerpt extends Model
{
    protected $fillable = array('type', 'amount', 'description', 'created_at');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
