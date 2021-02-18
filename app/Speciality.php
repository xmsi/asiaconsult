<?php

namespace App;

class Speciality extends Common
{
	protected $fillable = [
		'faculty_id', 'contract', 'service_sum', 'name', 'online', 'status', 'full_time', 'part_time', 'weekend_time', 'night_time', 'service_sum_name'
	];

	protected $table = 'speciality';

	public function faculty()
	{
		return $this->belongsTo(Faculty::class);
	}

    public function students()
    {
        return $this->hasMany(Student::class);
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

        if($request->weekend_time == null){
            $this->weekend_time = 0;
        } else {
            $this->weekend_time = 1;
        }

        if($request->night_time == null){
            $this->night_time = 0;
        } else {
            $this->night_time = 1;
        }
	}

    public function validateDocs()
    {
        if ($this->faculty->university->status && $this->faculty->status && $this->status && volumeofplace()) {
            return true;
        }

        return false;
    }

    public function validateSelection()
    {
        if ($this->faculty->university->status && $this->faculty->status && $this->status && $this->volumeofspeciality) {
            return true;
        }

        return false;
    }

    public function getVolumeofspecialityAttribute()
    {
        $faculty = $this->faculty->load(['specialities' => function($q){
            $q->withCount('students');
        }]);

        $volume = 0;

        foreach ($faculty->specialities as $speciality) {
            $volume += $speciality->students_count;
        }

        $result = $faculty->volume - $volume;

        return $result;
    }
}
