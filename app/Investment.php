<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = array('amount', 'description', 'type');

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
