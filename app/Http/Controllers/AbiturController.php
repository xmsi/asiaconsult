<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Phone;
use App\User;
use App\Speciality;
use App\Student;
use App\Countries;
use Carbon\Carbon;

class AbiturController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'role:abiturient'])->only(['university_select', 'university_selected', 'senddocs', 'docs_receive', 'success', 'error', 'main']);

		$this->middleware('guest_manager:manager')->only(['signin', 'signin_receive', 'phone', 'phone_recieve', 'sms', 'sms_recieve']);
	}

	public function phone()
	{
		return view('frontend.abitur.phone');
	}

	public function signin()
	{
		return view('frontend.abitur.signin');
	}

	public function signin_receive(Request $request)
	{
		$this->validate($request, [
			'phone' => 'required|integer',
			'password' => 'required'
		]);

		$user_data = array(
			'name' => $request->phone,
			'password' => $request->password
		);

		if(Auth::attempt($user_data)){
			if(!getStudent()->speciality_id){
				return redirect('/university_select');
			} elseif(!getStudent()->passport){
				return redirect('/cab/senddocs');
			}

			return redirect('/cab/');
		} else {
			return redirect()->back()->withErrors(['Неправильно введены дынные']);
		}
	}

	public function phone_recieve(Request $request)
	{
		$this->validate($request, [
			'phone' => 'required|integer'
		]);

		if (Student::where('phone', $request->phone)->exists()) {
			return redirect()->back()->withErrors(['Этот номер был зарегестрирован ранее']);
		}
		$phone = Phone::firstOrNew(['phone' => $request->phone]);
		$phone->sms_code = rand(11112, 99998);
		// $sms = $phone->send_sms();
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
			'passport_id' => 'required',
			'passport_date' => 'required',
			'passport_iib' => 'required',
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
        	if (Auth::check()) {
        		$role = Auth::user()->roles->first()->name;
        		if($role == 'manager'){
        			$student->manager_id = Auth::user()->manager->id;
        		} if ($role == 'university') {
        			$student->manager_id = Auth::id();
        		}
        	}
        	
        	$student->save();
        }

        $user_data = array(
        	'name' => $request->phone,
        	'password' => $request->password
        );
        Auth::attempt($user_data);


        return redirect('/university_select');
	}

	public function university_select()
	{
		$country = Countries::pluck('name', 'id')->toArray();

		return view('frontend.abitur.university_select', compact('country'));
	}

	public function university_selected(Request $request)
	{
		$this->validate($request, [
			'speciality' => 'required|integer',
			'formatype' => 'required|integer'
		]);	
		if(Speciality::find($request->speciality)->validateDocs()){
			$user = Auth::user();
			$user->student->update([
				'speciality_id' => $request->speciality,
				'type' => $request->formatype,
			]);

			return redirect('/cab/senddocs');
		}

		return redirect('/docs_error');
	}

	public function senddocs()
	{
		$student = getStudent();

		return view('frontend.abitur.senddocs', compact('student'));
	}

	public function docs_receive(Request $request)
	{
		$validate = 'required|file|mimes:pdf,doc,docx,jpeg,jpg,png,bmp,gif,svg,webp';
		$this->validate($request, [
			'diplom' => $validate,
			'passport' => $validate,
		]);

		if(getStudent()->validateDocs()){
			if ($request->hasFile('diplom')) {
				// \File::delete(public_path().'/stdocs/diplom/'.$request->diplom);
				$diplom = $request->file('diplom');
				$diplomName = $diplom->getClientOriginalName();
				$diplomName = getStudent()->id . '__' . Carbon::now()->timestamp.$diplomName;
				$diplom->move('stdocs/diplom/', $diplomName);
			}

			if ($request->hasFile('passport')) {
				// \File::delete(public_path().'/stdocs/passport/'.$request->passport);
				$passport = $request->file('passport');
				$passportName = $passport->getClientOriginalName();
				$passportName = getStudent()->id . '__' .Carbon::now()->timestamp.$passportName;
				$passport->move('stdocs/passport/', $passportName);
			}

			getStudent()->update([
				'diplom' => $diplomName,
				'passport' => $passportName,
				'docs_date' => Carbon::now()->timestamp
			]);

			// getStudent()->sendToTg();

			return redirect('/docs_success');
		}

		return redirect('/docs_error');
	}

	public function success()
	{
		return view('frontend.abitur.success');
	}

	public function error()
	{
		return view('frontend.abitur.error');
	}

	public function main()
	{
		return view('frontend.abitur.main');
	}

	public function dogovor()
	{
		$pdf = \PDF::loadView('frontend.testing');
		return $pdf->download('dogovor.pdf');
	}
}
