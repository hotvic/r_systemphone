<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastEarning extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function earning()
    {
        return $this->belongsTo('App\Earning');
    }
}
