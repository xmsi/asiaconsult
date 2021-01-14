<?php 

namespace App\Http\Controllers;

use App\University;
use App\Faculty;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * 
 */
class ApiController extends Controller
{
	public function university(Request $request)
	{
		$university = University::where('country_id', $request->country_id)->pluck('name', 'id');

		return response($university->jsonSerialize(), Response::HTTP_OK);
	}

	public function faculty(Request $request)
	{
		$university = Faculty::where('university_id', $request->university_id)->pluck('name', 'id');

		return response($university->jsonSerialize(), Response::HTTP_OK);
	}

	public function facultydata(Request $request)
	{
		$faculty = Faculty::find($request->faculty_id);
		$sp = Speciality::where('faculty_id', $request->faculty_id);
		$speciality = $sp->get();
		if ($sp->exists()) {
			$speciality[0]->volume = $faculty->volume;
			$speciality[0]->currency = $faculty->university->country->currency;
		}

		return response($speciality->jsonSerialize(), Response::HTTP_OK);
	}
}

?>