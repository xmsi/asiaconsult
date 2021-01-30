<?php

namespace App\Http\Controllers;

use App\User;
use App\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:managers_boss');
    }


    public function index()
    {
        $managers = Manager::where(['boss_manager_id' => auth()->user()->bossManager->id])->withCount('students')->get();

        return view('admin.manager.index', compact('managers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        // dd($manager->name);
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
            'name' => 'required',
            'status' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        $manager = new Manager();
        $manager->fill($request->except(['btncreate', 'login', 'password']));
        $manager->boss_manager_id = auth()->user()->bossManager->id;

        $user = new User();
        $user->name = $request->login;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->roles()->attach(5);

        $manager->user_id = $user->id;

        $manager->save();

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
    public function edit(Manager $manager)
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
    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $manager->fill($request->except(['login', 'password']));

        $manager->save();

        if($request->password || $request->login){
            $user = $manager->user;

            if($request->password) {
                $user->password = bcrypt($request->password);
            }
            if($request->login) {
                $user->name = $request->login;
            }

            $user->save();

            if($user->roles->isEmpty()){
                $user->roles()->attach(5);
            }
        }

        $manager->save();

        return redirect('/admin/manager/')->with('success', 'изменен успешно');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        $manager->user->roles()->detach();
        $manager->user->delete();

        return redirect('/admin/manager');
    }
}
