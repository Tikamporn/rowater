<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function User(){
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
    }

    public function Zone(){
        return $this->belongsToMany(Zone::class)->withTimestamps();
    }
}
