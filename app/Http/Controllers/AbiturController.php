<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Phone;
use App\User;
use App\Student;
use App\Countries;

class AbiturController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only('university_select');;
	}

	public function phone()
	{
		return view('frontend.abitur.phone');
	}

	public function phone_recieve(Request $request)
	{
		if (Student::where('phone', $request->phone)->exists()) {
			return redirect()->back()->withErrors(['Этот номер был зарегестрирован ранее']);
		}
		$phone = Phone::firstOrNew(['phone' => $request->phone]);
		$phone->sms_code = rand(11112, 99998);
		$sms = $phone->send_sms();
		$phone->save();

		return redirect('/sms/'.$phone->id);
	}

	public function sms($phone)
	{
		return view('frontend.abitur.sms', compact('phone'));
	}

	public function sms_recieve(Request $request)
	{
		$phone = Phone::find($request->id);
		if ($phone->sms_code == $request->sms_code) {
			$phone->status = 1;
			$phone->save();

			return redirect('/worksheet/'. \Crypt::encryptString($phone->phone));
		} else {
			return redirect()->back()->withErrors(['Неправильно введен код']);
		}
	}


	public function worksheet($phone)
	{
		$phone = \Crypt::decryptString($phone); 

		return view('frontend.abitur.worksheet', compact('phone'));
	}

	public function worksheet_receive(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'second_name' => 'required',
			'password' => 'required|confirmed|min:6',
		]);

		$user = new User();
		$user->name = $request->phone;
		$user->password = bcrypt($request->password); 
		$is_saved = $user->save();

		$user->roles()->attach(4);

        if($is_saved){
        	$student = new Student();
        	$student->fill($request->except(['password_confirmation']));
        	$student->user_id = $user->id;
        	$student->created_date = time(); 
        	$student->save();
        }

        if(!Auth::check()){
        	$user_data = array(
        		'name' => $request->phone,
        		'password' => $request->password
        	);
        	Auth::attempt($user_data);
        }


        return redirect('/university_select');
	}

	public function university_select()
	{
		$country = Countries::pluck('name', 'id')->toArray();

		return view('frontend.abitur.university_select', compact('country'));
	}
}
