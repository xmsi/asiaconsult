<?php

namespace App\Http\Controllers;

use App\Student;
use App\Faculty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsUController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:university');
    }

    public function index()
    {
    	$faculty = Faculty::where('university_id', Auth::user()->university_id)->with(['students' => function($q){
    		$q->where('perevod_status', '=', 1);
    		$q->orderBy('perevod_date', 'desc');
    	}])->get();

    	return view('admin.studentsU.index', ['faculty' => $faculty]);
    }

    public function show(Student $student)
    {
    	return view('admin.studentsU.show', compact('student'));
    }

    public function edit(Student $student)
    {
    	return view('admin.studentsU.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        if ($request->hasFile('entrance_ref')) {
            \File::delete(public_path().'/stdocs/'.$student->entrance_ref);
            $image = $request->file('entrance_ref');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'entrance_ref_'.$imageName;
            $image->move('stdocs/', $imageName);
            $student->entrance_ref = $imageName;
        }

        $student->entrance_date = Carbon::now()->timestamp;

        $student->save();

        return redirect('/admin/studentsU/')->with('success', 'изменен успешно');
    }
}
