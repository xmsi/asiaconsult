<?php

namespace App;

class Speciality extends Common
{
	protected $fillable = [
		'faculty_id', 'contract', 'service_sum', 'name', 'online', 'status', 'full_time', 'part_time'
	];

	protected $table = 'speciality';

	public function faculty()
	{
		return $this->belongsTo(Faculty::class);
	}

	public function normaltype($request)
	{
        if($request->full_time == null){
            $this->full_time = 0;
        } else {
        	$this->full_time = 1;
        }

        if($request->part_time == null){
            $this->part_time = 0;
        } else {
        	$this->part_time = 1;
        }

        if($request->online == null){
            $this->online = 0;
        } else {
        	$this->online = 1;
        }
	}
}
