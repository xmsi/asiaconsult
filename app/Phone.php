<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'phone', 'sms_code', 'status'
	];

	public function send_sms()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "notify.eskiz.uz/api/message/sms/send",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array('mobile_phone' => '998'.$this->phone,'message' => 'Код для входа: '.$this->sms_code,'from' => 'ASIACONSULT'),
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ub3RpZnkuZXNraXoudXpcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MTAzNjExOTQsImV4cCI6MTYxMjk1MzE5NCwibmJmIjoxNjEwMzYxMTk0LCJqdGkiOiJRYjR4bnNCVlJ3SWwyb29PIiwic3ViIjozMTIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.g5dQp3xM-pQDfO9Z-MoYMvg-VfktYaZ2YgsTkZj6ybY"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}
}
