<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentsTController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:translator|superadmin');
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
            \File::delete(public_path().'/stdocs/passport_per'.$student->passport_per);
            $image = $request->file('passport_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_passport_per_'.$imageName;
            $image->move('stdocs/passport_per/', $imageName);
            $student->passport_per = $imageName;
        }

        if ($request->hasFile('diplom_per')) {
            \File::delete(public_path().'/stdocs/diplom_per'.$student->diplom_per);
            $image = $request->file('diplom_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_diplom_per_'.$imageName;
            $image->move('stdocs/diplom_per/', $imageName);
            $student->diplom_per = $imageName;
        }

        if ($request->hasFile('attestat_per')) {
            \File::delete(public_path().'/stdocs/attestat_per'.$student->attestat_per);
            $image = $request->file('attestat_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_attestat_per_'.$imageName;
            $image->move('stdocs/attestat_per/', $imageName);
            $student->attestat_per = $imageName;
        }

        if ($request->hasFile('zags_per')) {
            \File::delete(public_path().'/stdocs/zags_per'.$student->zags_per);
            $image = $request->file('zags_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_zags_per_'.$imageName;
            $image->move('stdocs/zags_per/', $imageName);
            $student->zags_per = $imageName;
        }

        if ($request->hasFile('parent_passport_per')) {
            \File::delete(public_path().'/stdocs/parent_passport_per'.$student->parent_passport_per);
            $image = $request->file('parent_passport_per');
            $imageName = $image->getClientOriginalName();
            $imageName = $student->id.'student_parent_passport_per_'.$imageName;
            $image->move('stdocs/parent_passport_per/', $imageName);
            $student->parent_passport_per = $imageName;
        }

        $student->perevod_date = Carbon::now()->timestamp;
        $student->perevod_status = 1;

        $student->save();

        return redirect('/admin/studentsT/')->with('success', 'изменен успешно');
    }

    public function show(Student $student)
    {
        return view('admin.studentsT.show', compact('student'));
    }
}

?>