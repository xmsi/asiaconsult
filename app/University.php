<?php

namespace App;

class University extends Common
{
	protected $fillable = [
		'name', 'country_id', 'deadline', 'status', 'description', 'image', 'link'
	];

	protected $table = 'univeristy';

	public function country()
	{
		return $this->belongsTo(Countries::class);
	}

	public function faculties()
	{
		return $this->hasMany(Faculty::class);
	}
}
