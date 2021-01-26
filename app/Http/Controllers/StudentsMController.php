<?php 

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

/**
 * 
 */
class StudentsMController extends Controller
{
	
	public function __construct()
	{
        $this->middleware('auth');
        $this->middleware('role:manager');
	}

	public function index()
	{
		$students = Student::where('manager_id', auth()->id())->get();

		return view('admin.studentsM.index', compact('students'));
	}
}


 ?>