<?php

namespace App\Http\Controllers;

use App\University;
use App\Countries;
use App\User;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universitiess = University::get();

        return view('admin.universities.index', compact('universitiess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        return view('admin.universities.show', compact('university'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::pluck('name', 'id')->toArray();

        return view('admin.universities.create', compact('countries'));
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
            'country_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
        ]);

        $date = date('Y-m-d', strtotime($request->date));

        $university = new University();
        $university->fill($request->except(['btncreate', 'image', 'date']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = 'university'.Carbon::now()->timestamp.$imageName;
            $image->move('images/', $imageName);
            $university->image = $imageName;
        }

        $university->deadline = $date;
        $university->save();

        if($request->password && $request->login){
            $user = new User();
            $user->name = $request->login;
            $user->password = bcrypt($request->password);
            $user->university_id = $university->id;
            $user->save();

            $user->roles()->attach(3);
        }

        if($request->btncreate){
            return redirect('/admin/universities/create');
        }

        return redirect('/admin/universities')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        $countries = Countries::pluck('name', 'id')->toArray(); 
        $university_user = User::where('university_id', $university->id)->first();

        return view('admin.universities.edit', compact('university', 'countries', 'university_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg,webp',
        ]);


        $university->fill($request->except(['deadline', 'image', 'login', 'password']));

        if ($request->hasFile('image')) {
            \File::delete(public_path().'/images/'.$university->image);
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = 'university'.Carbon::now()->timestamp.$imageName;
            $image->move('images/', $imageName);
            $university->image = $imageName;
        }

        if($request->deadline){
            $university->deadline = Carbon::parse($request->deadline)->format("Y-m-d");
        }

        $university->save();

        if($request->password || $request->login){
            $user = User::firstOrCreate(
                ['university_id' => $university->id],
                [
                    'name' => $request->login,
                    'password' => bcrypt($request->password),
                    'university_id' => $university->id
                ]);

            if($request->password) {
                $user->password = bcrypt($request->password);
            }
            if($request->login) {
                $user->name = $request->login;
            }

            $user->save();

            if($user->roles->isEmpty()){
                $user->roles()->attach(3);
            }
        }

        return redirect('/admin/universities/')->with('success', 'изменен успешно');
    }

    public function destroy(University $university)
    {
            \File::delete(public_path().'/images/'.$university->image);
            $university->delete();

            return redirect('/admin/universities');
    }
}
