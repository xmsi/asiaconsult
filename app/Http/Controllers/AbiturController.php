<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;

class AbiturController extends Controller
{
	public function phone()
	{
		return view('frontend.abitur.phone');
	}

	public function phone_recieve(Request $request)
	{
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
			// $phone->save();

			return redirect('/worksheet/'. \Crypt::encryptString($phone->phone));
		} else {
			dd($phone->sms_code);
		}
	}


	public function worksheet($phone)
	{
		$phone = \Crypt::decryptString($phone); 

		return view('frontend.abitur.worksheet', compact('phone'));
	}
}
