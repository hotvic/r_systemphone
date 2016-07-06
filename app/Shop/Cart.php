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

    public function removeItem($item)
    {
        if (array_key_exists($item->id, $this->items))
        {
            $items  = $this->items;
            $key    = sprintf("%d.%s", $item->id, 'amount');
            $amount = array_get($items, $key);

            if ($amount <= 1)
                $this->removeProduct($item);
            else
            {
                array_set($items, $key, $amount - 1);

                $this->items = $items;
            }
        }
    }

    public function removeProduct($item)
    {
        if (array_key_exists($item->id, $this->items))
        {
            $this->items = array_except($this->items, [$item->id]);
        }
    }
}
