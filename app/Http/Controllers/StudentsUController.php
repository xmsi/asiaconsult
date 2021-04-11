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
    		$q->where('service_contract_check', '=', 1);
            if (Auth::user()->checkRussia()) {
                $q->where('perevod_status', '=', 1);
            }
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
            \File::delete(public_path().'/stdocs/entrance_ref/'.$student->entrance_ref);
            $image = $request->file('entrance_ref');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'entrance_ref_'.$imageName;
            $image->move('stdocs/entrance_ref/', $imageName);
            $student->entrance_ref = $imageName;
            $student->entrance_date = Carbon::now()->timestamp;
        }

        if ($request->hasFile('university_contract')) {
            \File::delete(public_path().'/stdocs/university_contract/'.$student->university_contract);
            $image = $request->file('university_contract');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'university_contract_'.$imageName;
            $image->move('stdocs/university_contract/', $imageName);
            $student->university_contract = $imageName;
        }

        $student->comments = $request->comments;


        $student->save();

        return redirect('/admin/studentsU/')->with('success', 'изменен успешно');
    }
}
