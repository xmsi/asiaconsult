<?php

namespace App\Http\Controllers;

use App\Student;

class StudentsSAController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }

    public function index()
    {
    	$students = Student::get()->sortByDesc("id");

    	return view('admin.studentsSh.index', ['students' => $students]);
    }

    public function destroy($student)
    {
        $student = Student::find($student);

        \File::delete(public_path().'/stdocs/passport/'.$student->passport);
        \File::delete(public_path().'/stdocs/diplom/'.$student->diplom);
        \File::delete(public_path().'/stdocs/attestat/'.$student->attestat);
        \File::delete(public_path().'/stdocs/zags/'.$student->zags);
        \File::delete(public_path().'/stdocs/parent_passport/'.$student->parent_passport);
        \File::delete(public_path().'/stdocs/attestat_per/'.$student->attestat_per);
        \File::delete(public_path().'/stdocs/zags_per/'.$student->zags_per);
        \File::delete(public_path().'/stdocs/parent_passport_per/'.$student->parent_passport_per);
        \File::delete(public_path().'/stdocs/service_contract_file/'.$student->service_contract_file);
        \File::delete(public_path().'/stdocs/service_shartnoma_file/'.$student->service_shartnoma_file);
        \File::delete(public_path().'/stdocs/passport_per/'.$student->passport_per);
        \File::delete(public_path().'/stdocs/diplom_per/'.$student->diplom_per);
        \File::delete(public_path().'/stdocs/image/'.$student->image);
        \File::delete(public_path().'/stdocs/university_pay/'.$student->university_pay);
        \File::delete(public_path().'/stdocs/university_contract/'.$student->university_contract);

        $student->delete();
        
        return redirect('/admin/studentsSA');
    }

}

?>