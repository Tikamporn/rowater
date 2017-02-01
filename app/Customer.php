<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function Zone(){
        return $this->belongsTo(Zone::class);
    }

    public function Group(){
        return $this->belongsTo(Group::class);
    }

    public function Team(){
        return $this->belongsTo(Team::class);
    }

    public function Product(){
    	return $this->belongsToMany(Product::class)->withPivot('id','customer_id','product_id','day','amount','price')->withTimestamps();
    }

    public function Custommerrequest(){
        return $this->hasMany(Custommerrequest::class);
    }
}
