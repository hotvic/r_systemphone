<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = array('amount', 'description');
    
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
