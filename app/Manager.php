<?php

namespace App;

class Manager extends Common
{
	protected $fillable = [
		'user_id', 'boss_manager_id', 'name', 'description', 'status'
	];

	protected $statuses = [
		0 => 'Закрыт доступ',
		1 => 'Работает'
	];

	public function students()
	{
		return $this->hasMany(Student::class);
	}

	public function boss_manager()
	{
		return $this->belongsTo(BossManager::class, 'boss_manager_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
