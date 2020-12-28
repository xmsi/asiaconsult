<?php

namespace App;

class Faculty extends Common
{
	protected $fillable = [
		'university_id', 'volume', 'image', 'name', 'description', 'status'
	];

	protected $table = 'faculty';

	public function university()
	{
		return $this->belongsTo(University::class);
	}
}
