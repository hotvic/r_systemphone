<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $fillable = array('amount', 'text');

    public function users()
    {
        return $this->belongsToMany('\App\User');
    }
}
