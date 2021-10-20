<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded;

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/product_image') . '/' . $img;
    }
}
