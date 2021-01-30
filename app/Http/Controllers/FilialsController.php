<?php

namespace App\Http\Controllers;

use App\Filial;
use Illuminate\Http\Request;

class FilialsController extends Controller
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
        $filials = Filial::get();

        return view('admin.filial.index', compact('filials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filial.create');
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
            'number' => 'required',
            'country' => 'required'
        ]);

        $filial = new Filial();
        $filial->fill($request->except('btncreate'));
        $filial->save();

        if($request->btncreate){
            return redirect('/admin/filial/create');
        }

        return redirect('/admin/filial')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Filial $filial)
    {
        return view('admin.filial.edit', compact('filial'));
    }

    public function show(Filial $filial)
    {
        return view('admin.filial.show', compact('filial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filial $filial)
    {
        $request->validate([
            'number' => 'required',
            'country' => 'required',
        ]);

        $filial->update($request->all());

        return redirect('/admin/filial/')->with('success', 'изменен успешно');
    }
}
