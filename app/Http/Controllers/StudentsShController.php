<?php

namespace App\Http\Controllers;

use App\Student;
use App\University;
use App\Speciality;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentsShController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:shartnoma|superadmin');
    }

    public function index()
    {
    	$students = Student::whereNotNull('service_date')->get()->sortByDesc("id");

    	return view('admin.studentsSh.index', ['students' => $students]);
    }

    public function edit($student)
    {
        $student = Student::find($student);
        $universities = University::pluck('name', 'id')->toArray();

    	return view('admin.studentsSh.edit', compact('student', 'universities'));
    }

    public function speciality(Request $request)
    {   
        $speciality = Speciality::where('faculty_id', $request->faculty_id)->pluck('name', 'id')->toArray();

        return json_encode($speciality);
    }

    // public function speciality(Request $request)
    // {   
    //     $speciality = Speciality::where('faculty_id', $request->faculty_id)->pluck('name', 'id')->toArray();

    //     return json_encode($speciality);
    // }

    public function update(Request $request, $student)
    {
        $student = Student::find($student);
        $student->fill($request->except(['speciality_id', 'type', 'service_date']));
        if ($request->speciality_id) {
            $student->speciality_id = $request->speciality_id;
        }
        if ($request->service_date) {
            $student->service_date = date('Y-m-d', strtotime($request->service_date));
        }
        if ($request->type != null) {
            $student->type = $request->type;
        }

        if ($request->hasFile('diplom')) {
            \File::delete(public_path().'/stdocs/'.'diplom'.'/'.$request->diplom);

            $file = $request->file('diplom');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'diplom'.'/', $fileName);

            $student->diplom = $fileName;
        }

        if ($request->hasFile('attestat')) {
            \File::delete(public_path().'/stdocs/'.'attestat'.'/'.$request->attestat);

            $file = $request->file('attestat');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'attestat'.'/', $fileName);

            $student->attestat = $fileName;
        }

        if ($request->hasFile('passport')) {
            \File::delete(public_path().'/stdocs/'.'passport'.'/'.$request->passport);

            $file = $request->file('passport');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'passport'.'/', $fileName);

            $student->passport = $fileName;
        }


        if ($request->hasFile('parent_passport')) {
            \File::delete(public_path().'/stdocs/'.'parent_passport'.'/'.$request->parent_passport);

            $file = $request->file('parent_passport');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'parent_passport'.'/', $fileName);

            $student->parent_passport = $fileName;
        }


        if ($request->hasFile('zags')) {
            \File::delete(public_path().'/stdocs/'.'zags'.'/'.$request->zags);

            $file = $request->file('zags');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'zags'.'/', $fileName);

            $student->zags = $fileName;
        }

        if ($request->hasFile('image')) {
            \File::delete(public_path().'/stdocs/'.'image'.'/'.$request->image);

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileName = $student->id . '__' . Carbon::now()->timestamp.$fileName;
            $file->move('stdocs/'.'image'.'/', $fileName);

            $student->image = $fileName;
        }

        // $diplomName = documents_receive('diplom', $request);
        // $attestatName = documents_receive('attestat', $request);
        // $passportName = documents_receive('passport', $request);
        // $parent_passportName = documents_receive('parent_passport', $request);
        // $zagsName = documents_receive('zags', $request);
        // $imageName = documents_receive('image', $request);

        //     $student->diplom = $diplomName;
        //     $student->passport = $passportName;
        //     $student->parent_passport = $parent_passportName;
        //     $student->attestat = $attestatName;
        //     $student->zags = $zagsName;
        //     $student->image = $imageName;

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