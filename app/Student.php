<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'phone', 'name', 'second_name', 'father_name', 'from_where_info', 'speciality_id', 'type', 'passport', 'diplom', 'passport_per', 'diplom_per', 'perevod_status', 'entrance_ref', 'created_date', 'perevod_date', 'entrance_date'  
	];
}
