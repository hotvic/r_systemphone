<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawalRequest extends Model
{
    protected $fillable = array('to', 'amount', 'description');

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function withdrawal()
    {
        return $this->belongsTo('\App\Withdrawal');
    }
}
