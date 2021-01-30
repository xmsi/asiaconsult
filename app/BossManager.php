<?php

namespace App;

class BossManager extends Common
{
	protected $fillable = [
		'user_id', 'filial_id', 'name', 'description', 'status'
	];

	protected $statuses = [
		0 => 'Закрыт доступ',
		1 => 'Работает'
	];

	public function filial()
	{
		return $this->belongsTo(Filial::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
