<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $guarded;
    protected $casts = [
        'products' => 'array',
    ];

    public function couriers() {
        return $this->belongsTo('App\Models\Courier', 'courier_id');
    }
}
