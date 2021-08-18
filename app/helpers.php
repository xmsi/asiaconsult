<?php 

use Illuminate\Support\Facades\Auth;
use App\Speciality;
use Carbon\Carbon;

function getStudent(){
	return auth()->user()->student;
}

function checkManagerStatus(){
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

function getNormalPhone($phone){
	return preg_replace('/(.{2})(.{3})(..)(..)/', '$1 $2 $3 $4', $phone);
}

function documents_receive($name, $request, $id = null){
	if ($request->hasFile($name)) {
		// \File::delete(public_path().'/stdocs/'.$name.'/'.$request->diplom);
		if ($id) {
			$stid = $id;
		} else {
			$stid = getStudent()->id;
		}

		$file = $request->file($name);
		$fileName = $file->getClientOriginalName();
		$fileName = $stid . '__' . Carbon::now()->timestamp.$fileName;
		$file->move('stdocs/'.$name.'/', $fileName);

		return $fileName;
	}

	return null;
}

function saleAlghoritm($code, $sum){
	$sale = $sum;

	/*25%*/      
	if ($code == 1) {
		$sale = $sum - (0.25 * $sum);
	} /* 50 % */ 
	elseif ($code == 2) {
		$sale = $sum - (0.50 * $sum);
	} /* 500 000 sum */ 
	elseif ($code == 3) {
		$sale = $sum - 500000;
	}

	return intval($sale);
}

function pdfDogovor($student){
	//  saving to pdf
	$pdf = \PDF::loadView('frontend.testing', compact('student'));
	if ($student->speciality->dogovor_free) {
		$pdf = \PDF::loadView('frontend.dogovor_free', compact('student'));
	}
	$pdfName = $student->id . 'dogovor.pdf';
	$check = $pdf->save(public_path('/stdocs/service_shartnoma_file/'.$pdfName));
}

function getConditionOfDogovor($student)
{
	if ($student->speciality->dogovor_free) {
		$pdf = \PDF::loadView('frontend.dogovor_free', compact('student'));
	} elseif ($student->speciality->faculty->university->country->currency == 'TJS') {
		$pdf = \PDF::loadView('frontend.dogovor_tjs', compact('student'));
	} else {
		$pdf = \PDF::loadView('frontend.testing', compact('student'));
	}

	return $pdf;
}

 ?>