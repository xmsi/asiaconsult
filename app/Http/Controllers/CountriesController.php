<?php

namespace App\Http\Controllers;

use App\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countriess = Countries::get();

        return view('admin.countries.index', compact('countriess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
            'currency' => 'required'
        ]);

        $country = new Countries();
        $country->fill($request->except('btncreate'));
        $country->save();

        if($request->btncreate){
            return redirect('/admin/countries/create');
        }

        return redirect('/admin/countries')->with('success', 'Успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Countries $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countries $country)
    {
        $request->validate([
            'name' => 'required',
            'currency' => 'required',
        ]);

        $country->update($request->all());

        return redirect('/admin/countries/')->with('success', 'изменен успешно');
    }
}
