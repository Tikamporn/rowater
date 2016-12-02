<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function Customer(){
		return $this->hasMany(Customer::class);
	}
}
