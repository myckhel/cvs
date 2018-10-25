<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
    	'event_date', 'active'
	];

    public function attendance(){
    	return $this->hasMany(Attendance::class);
    }
}
