<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest_manager:abiturient,admin')->except('logout');
	}

	public function index()
	{
		return view('admin.login');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'password' => 'required',
		]);

		$user_data = array(
			'name' => $request->get('name'),
			'password' => $request->get('password')
		);

		if(Auth::attempt($user_data)){
			if (!checkManagerStatus()) {
				Auth::logout();
				return back()->with('error', 'Доступ закрыт');
			}

			return redirect('/admin');
		} else {
			return back()->with('error', 'Неправильно введены данные');
		}
	}

	public function logout()
	{
		\Auth::logout();
		return redirect('/');
	}
}
