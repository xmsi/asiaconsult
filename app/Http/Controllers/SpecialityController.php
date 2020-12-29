<?php

namespace App\Http\Controllers;

use App\Speciality;
use App\Faculty;
use App\University;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $specialitys = Speciality::get();

        return view('admin.speciality.index', compact('specialitys'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        return view('admin.speciality.show', compact('speciality'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::pluck('name', 'id')->toArray();

        return view('admin.speciality.create', compact('universities'));
    }

    public function faculty(Request $request)
    {   
        $faculty = Faculty::where('university_id', $request->university_id)->pluck('name', 'id')->toArray();

        return json_encode($faculty);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'status' => 'required',
            'contract' => 'required',
            'service_sum' => 'required'
        ]);

        $speciality = new Speciality();
        $speciality->fill($request->except('btncreate'));
        $speciality->save();

        if($request->btncreate){
            return redirect('/admin/speciality/create');
        }

        return redirect('/admin/speciality')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        $faculty = Faculty::get();

        return view('admin.speciality.edit', compact('speciality', 'faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'status' => 'required',
            'contract' => 'required',
            'service_sum' => 'required'
        ]);


        $speciality->fill($request->except(['online','part_time','full_time']));
        $speciality->normaltype($request);
        $speciality->save();

        return redirect('/admin/speciality/')->with('success', 'изменен успешно');
    }

    public function destroy(Speciality $speciality)
    {
            $speciality->delete();

            return redirect('/admin/speciality');
    }
}
