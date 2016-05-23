<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotaRequest extends Model
{
    protected $fillable = array('quota_id', 'howmuch', 'receipt_path');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function quota()
    {
        return $this->belongsTo('App\Quota');
    }
}
