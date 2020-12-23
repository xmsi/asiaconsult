<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'title', 'category', 'author','description', 'image', 'file'
	];

	protected $table = 'countries';

}
