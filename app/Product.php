<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Customer(){
    	return $this->belongsToMany(Customer::class)->withPivot('customer_id','product_id','amount','id')->withTimestamps();
    }

    public function Customerrequest(){
    	return $this->hasMany(Customerrequest::class);
    }
}
