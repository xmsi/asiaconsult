<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:university');
    }


    public function index()
    {
        $managers = User::where(['university_id' => auth()->user()->university_id])->whereHas('roles', function($q){
                $q->where('name', 'manager');
        })->withCount('managerStudents')->get();

        return view('admin.manager.index', compact('managers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(User $manager)
    {
        return view('admin.manager.show', compact('manager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.create');
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
            'login' => 'required',
            'password' => 'required',
        ]);

        $manager = new User();
        $manager->name = $request->login;
        $manager->password = bcrypt($request->password);
        $manager->university_id = auth()->user()->university_id;
        $manager->save();

        $manager->roles()->attach(5);

        if($request->btncreate){
            return redirect('/admin/manager/create');
        }

        return redirect('/admin/manager')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manager)
    {
        return view('admin.manager.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $manager)
    {
        $request->validate([
            'login' => 'required',
        ]);

        $manager->name = $request->login;
        if($request->has('password')){
            $manager->password = bcrypt($request->password);
        }

        $manager->save();

        return redirect('/admin/manager/')->with('success', 'изменен успешно');
    }

    public function destroy(User $manager)
    {
        $manager->roles()->detach();
        $manager->delete();

        return redirect('/admin/manager');
    }
}
