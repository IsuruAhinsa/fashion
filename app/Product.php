<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function priceFormat()
    {
        return 'LKR '. number_format($this->price, 2);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

}
