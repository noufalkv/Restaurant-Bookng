<?php

namespace App;

use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'order_details' => 'array'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
