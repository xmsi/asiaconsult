<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'phone', 'name', 'second_name', 'father_name', 'from_where_info', 'speciality_id', 'type', 'passport', 'diplom', 'passport_per', 'diplom_per', 'perevod_status', 'passport_id', 'passport_date', 'passport_iib','entrance_ref', 'created_date', 'perevod_date', 'docs_date', 'entrance_date'  , 'service_date', 'service_contract_file'
	];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function validateDocs()
    {
    	return $this->speciality->validateDocs();
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function getFullNameAttribute()
    {
        return $this->second_name . ' ' . $this->name . ' ' . $this->father_name;
    }
}
