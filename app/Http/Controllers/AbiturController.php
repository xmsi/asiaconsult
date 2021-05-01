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

		$this->middleware('guest_manager:manager')->only(['signin', 'signin_receive', 'phone', 'phone_recieve', 'sms', 'sms_recieve', 'passwordreset', 'pwdreset', 'pwdresetp', 'pwdreset_last']);
	}

	public function phone()
	{
		return view('frontend.abitur.phone');
	}

	public function signin()
	{
		// dd(app()->getLocale());
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

	public function passwordreset()
	{
		return view('frontend.abitur.passwordreset.phone');
	}

	public function pwdreset(Request $request)
	{
		$user = User::where('name', $request->phone);

		if(!$user->exists()){
			return redirect()->back()->withErrors([__('Этот номер не зарегистрирован')]);
		}

		$phone = Phone::firstOrNew(['phone' => $request->phone]);
		$phone->sms_code = rand(11112, 99998);
		$sms = $phone->send_sms();
		$phone->save();

		return redirect('/sms/'.$phone->id.'/1');
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

		// return redirect('/sms/'.$phone->id);
		return redirect('/worksheet/'. \Crypt::encryptString($phone->phone));
	}

	public function sms($phone, $pwdreset = 0)
	{
		return view('frontend.abitur.sms', compact('phone', 'pwdreset'));
	}

	public function sms_recieve(Request $request)
	{
		$phone = Phone::find($request->id);
		if ($phone->sms_code == $request->sms_code) {
			$phone->status = 1;
			$phone->save();

			if($request->pwdreset == 1){
				return redirect('/pwdresetp/'. \Crypt::encryptString($phone->phone));
			}

			return redirect('/worksheet/'. \Crypt::encryptString($phone->phone));
		} else {
			return redirect()->back()->withErrors(['Неправильно введен код'])->with('pwdreset', 1);
		}
	}

	public function pwdresetp($phone)
	{
		$phone = \Crypt::decryptString($phone); 

		return view('frontend.abitur.passwordreset.pwd', compact('phone'));
	}

	public function pwdreset_last(Request $request)
	{
		$this->validate($request, [
			'password' => 'required|confirmed|min:6',
		]);
		$user = User::where('name', $request->phone)->first();
		$user->password = bcrypt($request->password);
		$is_saved = $user->save();

		if($is_saved){
			return redirect('/')->with('success', 'Пароль успешно изменен');
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
			'email' => 'required|email',
			'passport_date' => 'required',
			'passport_iib' => 'required',
			'password' => 'required|confirmed|min:6',
		]);

		$user = new User();
		$user->name = $request->phone;
		$user->email = $request->email;
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
		if(Speciality::find($request->speciality)->validateSelection()){
			$user = Auth::user();
			$user->student->update([
				'speciality_id' => $request->speciality,
				'type' => $request->formatype,
				'service_date' => date('Y-m-d')
			]);

			$student = getStudent();
			$pdf = \PDF::loadView('frontend.testing', compact('student'));
			if ($student->speciality->dogovor_free) {
				$pdf = \PDF::loadView('frontend.dogovor_free', compact('student'));
			}
			$pdfName = $user->student->id . 'dogovor.pdf';
			$check = $pdf->save(public_path('/stdocs/service_shartnoma_file/'.$pdfName));

			// if (getStudent()->checkRussia()) {
			// 	getStudent()->update([
			// 		'perevod_status' => 0,
			// 	]);
			// }

			if ($check) {
				getStudent()->update([
					'service_shartnoma_file' => $pdfName,
					'service_amount' => $student->speciality->service_sum,
				]);
			}

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
		$validate = '|file|mimes:pdf,doc,docx,jpeg,jpg,png,bmp,gif,svg,webp';
		$this->validate($request, [
			'diplom' => 'required_without:attestat'.$validate,
			'attestat' => 'required_without:diplom'.$validate,
			'passport' => 'required'.$validate,
			'image' => 'required'.$validate,
		]);

		if (!getStudent()->service_contract_file) {
			return redirect()->back()->withErrors(['Пожалуйста загрузите квитанцию об оплате']);
		}


		$diplomName = documents_receive('diplom', $request);
		$attestatName = documents_receive('attestat', $request);
		$passportName = documents_receive('passport', $request);
		$parent_passportName = documents_receive('parent_passport', $request);
		$zagsName = documents_receive('zags', $request);
		$imageName = documents_receive('image', $request);


		getStudent()->update([
			'diplom' => $diplomName,
			'passport' => $passportName,
			'parent_passport' => $parent_passportName,
			'attestat' => $attestatName,
			'zags' => $zagsName,
			'image' => $imageName,
			'docs_date' => Carbon::now()->timestamp
		]);

			// getStudent()->sendToTg();

		return redirect('/docs_success');

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
		$student = getStudent();

		if ($sh = $student->service_shartnoma_file) {
			$headers = [
              'Content-Type' => 'application/pdf',
           	];

			return response()->download(public_path().'/stdocs/service_shartnoma_file/'.$sh, $sh, $headers);
		}

		$pdf = \PDF::loadView('frontend.testing', compact('student'));
		if ($student->speciality->dogovor_free) {
			$pdf = \PDF::loadView('frontend.dogovor_free', compact('student'));
		}

		return $pdf->download('dogovor.pdf');

		// $check = $pdf->save(public_path('/stdocs/service_shartnoma_file/'.getStudent()->id. 'dogovor.pdf'));

		// return view('frontend.testing');
	}

	public function service_contract_file(Request $request)
	{
		$validate = 'required|file|mimes:pdf,doc,docx,jpeg,jpg,png,bmp,gif,svg,webp';
		$this->validate($request, [
			'service_contract_file' => $validate,
		]);

		$service_contract_file = $request->file('service_contract_file');
		$service_contract_fileName = $service_contract_file->getClientOriginalName();
		$service_contract_fileName = getStudent()->id . '__' . Carbon::now()->timestamp.$service_contract_fileName;
		$service_contract_file->move('stdocs/service_contract_file/', $service_contract_fileName);

		$a = getStudent()->update(['service_contract_file' => $service_contract_fileName]);

		if($a){
			return back()->with('success', 'Успешно принята');
		} else {
			return back()->withErrors(['Ошибка']);
		}

	}

	public function universitycontract(Request $request)
	{
		$validate = 'required|file|mimes:pdf,doc,docx,jpeg,jpg,png,bmp,gif,svg,webp';
		$this->validate($request, [
			'university_pay' => $validate,
		]);

		$university_pay = $request->file('university_pay');
		$university_payName = $university_pay->getClientOriginalName();
		$university_payName = getStudent()->id . '__' . Carbon::now()->timestamp.$university_payName;
		$university_pay->move('stdocs/university_pay/', $university_payName);

		$a = getStudent()->update(['university_pay' => $university_payName]);

		if($a){
			return back()->with('success', 'Успешно принята');
		} else {
			return back()->withErrors(['Ошибка']);
		}
	}
}
