<?php

namespace App\Exports;

use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $students = Student::whereNotNull('service_date')->get();
        // dd($students[0]->manager->boss_manager->filial->number);
        return view('exports.students', compact('students'));
    }
}
