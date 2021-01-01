<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\University;
use App\Student;
use App\Countries;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$students = Student::count();
		$universities = University::count();
		$countries = Countries::count();
		$faculty = Faculty::count();

		return view('admin.index', compact('students', 'universities', 'countries', 'faculty'));
	}
}





?>