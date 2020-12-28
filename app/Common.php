<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Common extends Model
{
	public $timestamps = false;

	protected $statuses = [
			0 => 'Закрыт прием документов',
			1 => 'Прием документов'
	];

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

	public function getStatusnAttribute()
	{
		foreach ($this->statuses as $key => $value) {
			if ($key == $this->status) {
				return $value;
			}
		}
	}

	public function status_dropdown()
	{
		return $this->statuses;
	}

}