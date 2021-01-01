<?php

namespace App\Http\Controllers;

use App\Faculty;
use Carbon\Carbon;
use File;
use App\University;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }


    public function index()
    {
        $facultys = Faculty::get();

        return view('admin.faculty.index', compact('facultys'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return view('admin.faculty.show', compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::pluck('name', 'id')->toArray();

        return view('admin.faculty.create', compact('universities'));
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
            'university_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
        ]);

        $faculty = new Faculty();
        $faculty->fill($request->except(['btncreate', 'image']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = 'faculty'.Carbon::now()->timestamp.$imageName;
            $image->move('images/', $imageName);
            $faculty->image = $imageName;
        }

        $faculty->save();

        if($request->btncreate){
            return redirect('/admin/faculty/create');
        }

        return redirect('/admin/faculty')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        $universities = University::pluck('name', 'id')->toArray(); 
        return view('admin.faculty.edit', compact('faculty', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required',
            'university_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
        ]);


        $faculty->fill($request->except('image'));

        if ($request->hasFile('image')) {
            \File::delete(public_path().'/images/'.$faculty->image);
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = 'faculty'.Carbon::now()->timestamp.$imageName;
            $image->move('images/', $imageName);
            $faculty->image = $imageName;
        }
        
        $faculty->save();

        return redirect('/admin/faculty/')->with('success', 'изменен успешно');
    }

    public function destroy(Faculty $faculty)
    {
            \File::delete(public_path().'/images/'.$faculty->image);
            $faculty->delete();

            return redirect('/admin/faculty');
    }
}
