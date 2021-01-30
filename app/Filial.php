<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Filial extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'number', 'country', 'description'
	];

	public function getFrontDescAttribute()
	{
		return Str::words($this->description, '45');
	}

	public function getFullNameAttribute()
	{
		return $this->number . ' ' . $this->country;
	}
}
