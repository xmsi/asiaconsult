<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class CheckServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:service_cheker');
    }

    public function index()
    {
    	$students = Student::whereNotNull('service_contract_file')->get()->sortByDesc("id");

    	return view('admin.check.index', compact('students'));
    }

    public function contract_true(Request $request)
    {
    	$student = Student::find($request->id);
    	$student->update(['service_contract_check' => 1]);
        if ($student->checkRussia()) {
            $student->sendtoTelegram();
        }

    	return redirect()->back()->with('success', 'Успешно изменен');
    }
}
