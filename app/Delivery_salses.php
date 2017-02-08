<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_salses extends Model
{
    public function Team(){
        return $this->belongsTo(Team::class);
    }

    public function Customer(){
        return $this->belongsTo(Customer::class);
    }

    public function Product(){
        return $this->hasMany(Product::class);
    }
}
