<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentRequest extends Model
{
    protected $fillable = array('amount', 'receipt_path', 'description');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function investment()
    {
        return $this->belongsTo('App\Investment');
    }
}
