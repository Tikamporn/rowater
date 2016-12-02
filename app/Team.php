<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function User(){
        return $this->belongsTo(User::class);
    }
    public function Zone(){
        return $this->hasMany(Zone::class);
    }
}
