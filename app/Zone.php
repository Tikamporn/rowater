<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
	public function Customer(){
		return $this->hasMany(Customer::class);
	}

	public function Team(){
        return $this->belongsToMany(Team::class)->withTimestamps();
    }
}
