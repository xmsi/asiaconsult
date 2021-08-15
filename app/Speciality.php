<?php

namespace App;

class Speciality extends Common
{
	protected $fillable = [
		'faculty_id', 'contract', 'service_sum', 'name', 'online', 'status', 'full_time', 'part_time', 'weekend_time', 'night_time', 'service_sum_name', 'full_part', 'night_11', 'night_collage', 'night_weekend_full', 'night_weekend_part', 'dogovor_free', 'volume'
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

        if($request->full_part == null){
            $this->full_part = 0;
        } else {
            $this->full_part = 1;
        }

        if($request->night_11 == null){
            $this->night_11 = 0;
        } else {
            $this->night_11 = 1;
        }

        if($request->night_collage == null){
            $this->night_collage = 0;
        } else {
            $this->night_collage = 1;
        }

        if($request->night_weekend_full == null){
            $this->night_weekend_full = 0;
        } else {
            $this->night_weekend_full = 1;
        }

        if($request->night_weekend_part == null){
            $this->night_weekend_part = 0;
        } else {
            $this->night_weekend_part = 1;
        }

        if($request->dogovor_free == null){
            $this->dogovor_free = 0;
        } else {
            $this->dogovor_free = 1;
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
        if ($this->faculty->university->status && $this->faculty->status && $this->status && $this->volumeofspeciality && ($this->volumeOfOneSpeciality !== 0) ) {
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

    public function getVolumeOfOneSpecialityAttribute()
    {
        $students_count = $this->students->count();

        if (!is_null($this->volume)) {
            $result = $this->volume - $students_count;
        } else {
            $result = null;
        }

        return $result;

    }
}
