<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'name', 'currency'
	];

	protected $table = 'countries';

}
