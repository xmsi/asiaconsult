<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentsTController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:translator');
    }

    public function index()
    {
    	$students = Student::where('service_contract_check', 1)->get()->sortByDesc("id");

    	return view('admin.studentsT.index', ['students' => $students]);
    }

    public function edit(Student $student)
    {
    	return view('admin.studentsT.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        if ($request->hasFile('passport_per')) {
            \File::delete(public_path().'/stdocs/'.$student->passport_per);
            $image = $request->file('passport_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_passport_per_'.$imageName;
            $image->move('stdocs/', $imageName);
            $student->passport_per = $imageName;
        }

        if ($request->hasFile('diplom_per')) {
            \File::delete(public_path().'/stdocs/'.$student->diplom_per);
            $image = $request->file('diplom_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_diplom_per_'.$imageName;
            $image->move('stdocs/', $imageName);
            $student->diplom_per = $imageName;
        }

        $student->perevod_date = Carbon::now()->timestamp;
        $student->perevod_status = 1;

        $student->save();

        return redirect('/admin/studentsT/')->with('success', 'изменен успешно');
    }
}

?>