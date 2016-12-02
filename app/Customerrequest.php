<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerrequest extends Model
{
    public function Customer(){
        return $this->belongsTo(Customer::class);
    }

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
