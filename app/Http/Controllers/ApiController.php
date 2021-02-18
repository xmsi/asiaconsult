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
		$university = University::where(['country_id' => $request->country_id, 'status' => 1])->pluck('name', 'id');

		return response($university->jsonSerialize(), Response::HTTP_OK);
	}

	public function faculty(Request $request)
	{
		$university = Faculty::where(['university_id' => $request->university_id, 'status' => 1])->pluck('name', 'id');

		return response($university->jsonSerialize(), Response::HTTP_OK);
	}

	public function facultydata(Request $request)
	{
		$speciality = Speciality::where(['faculty_id' => $request->faculty_id, 'status' => 1])->with('Faculty:id,volume')->get();

		$speciality[0]->volumeofspeciality = $speciality[0]->volumeofspeciality;

		return response($speciality->jsonSerialize(), Response::HTTP_OK);
	}

	public function speciality(Request $request)
	{
		$speciality = Speciality::where(['id' => $request->speciality_id,'status' => 1])->with('faculty.university.country')->first(); 
		

		return response($speciality->jsonSerialize(), Response::HTTP_OK);
	}
}

?>