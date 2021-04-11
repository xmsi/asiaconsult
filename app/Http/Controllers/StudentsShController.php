<?php

namespace App\Http\Controllers;

use App\Student;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentsShController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:shartnoma');
    }

    public function index()
    {
    	$students = Student::whereNotNull('service_date')->get()->sortByDesc("id");

    	return view('admin.studentsSh.index', ['students' => $students]);
    }

    public function edit($student)
    {
        $student = Student::find($student);

    	return view('admin.studentsSh.edit', compact('student'));
    }

    public function update(Request $request, $student)
    {
        $student = Student::find($student);
        $student->fill($request->all());
        $student->save();

        return redirect('/admin/studentsSh/')->with('success', 'изменен успешно');
    }

    public function export() 
    {
        return Excel::download(new StudentsExport, 'users.xlsx');
    }

    public function show(Student $student)
    {
        return view('admin.studentsT.show', compact('student'));
    }

    public function download(Student $student)
    {
        $pdf = \PDF::loadView('frontend.testing', compact('student'));

        return $pdf->download('dogovor.pdf');
    }
}

?>