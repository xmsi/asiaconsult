<?php 

use Illuminate\Support\Facades\Auth;
use App\Speciality;

function getStudent(){
	return auth()->user()->student;
}

function checkManagerStatus($user_data){
	Auth::once($user_data);
	$role = Auth::user()->roles->first()->name;

	if ($role == 'manager') {
		if (Auth::user()->manager->status == 0) {
			return false;
		}
	}
	if ($role == 'managers_boss') {
		if (Auth::user()->bossManager->status == 0) {
			return false;
		}
	}

	return true;
}

function volumeofplace()
{
	$faculty = getStudent()->speciality->faculty->load(['specialities' => function($q){
		$q->withCount('students');
	}]);

	$volume = 0;

	foreach ($faculty->specialities as $speciality) {
		$volume += $speciality->students_count;
	}

	$result = $faculty->volume - $volume;

	return $result;
}

 ?>