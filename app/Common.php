<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Common extends Model
{
	public $timestamps = false;

	public function getCuttedDescAttribute()
	{
		return Str::words($this->description, '25');
	}

	public function getFrontDescAttribute()
	{
		return Str::words($this->description, '45');
	}

	public function getNormaldeadlineAttribute()
	{
		return date('d-m-Y', strtotime($this->deadline));
	}

}