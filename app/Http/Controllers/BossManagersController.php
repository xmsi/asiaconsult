<?php

namespace App\Http\Controllers;

use App\BossManager;
use App\Filial;
use App\User;
use Illuminate\Http\Request;

class BossManagersController extends Controller
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
        $bossManagers = BossManager::get();

        return view('admin.bossManager.index', compact('bossManagers'));
    }

  /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(BossManager $bossManager)
    {
        return view('admin.bossManager.show', compact('bossManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filials = Filial::get(['number', 'country', 'id'])->pluck('full_name', 'id')->toArray();

        return view('admin.bossManager.create', compact('filials'));
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
            'filial_id' => 'required',
            'login' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $bossManager = new BossManager();
        $bossManager->fill($request->except(['btncreate', 'login', 'password']));

        if($request->password && $request->login){
            $user = new User();
            $user->name = $request->login;
            $user->password = bcrypt($request->password);
            $user->save();

            $user->roles()->attach(6);
        }

        $bossManager->user_id = $user->id;
        $bossManager->save();

        if($request->btncreate){
            return redirect('/admin/bossManager/create');
        }

        return redirect('/admin/bossManager')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(BossManager $bossManager)
    {
        $filials = Filial::get(['number', 'country', 'id'])->pluck('full_name', 'id')->toArray();
        return view('admin.bossManager.edit', compact('bossManager', 'filials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BossManager $bossManager)
    {
        $request->validate([
            'name' => 'required',
            'filial_id' => 'required',
            'status' => 'required',
        ]);


        $bossManager->fill($request->except(['login', 'password']));

        $bossManager->save();

        if($request->password || $request->login){
            $user = $bossManager->user;

            if($request->password) {
                $user->password = bcrypt($request->password);
            }
            if($request->login) {
                $user->name = $request->login;
            }

            $user->save();

            if($user->roles->isEmpty()){
                $user->roles()->attach(6);
            }
        }

        return redirect('/admin/bossManager/')->with('success', 'изменен успешно');
    }
}
