<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationType extends Model
{
    //
    public function vacation(){

		return $this->hasMany('App\Vacation');
	}
}
