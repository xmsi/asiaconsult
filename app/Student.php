<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $timestamps = false;

    protected $guarded = ['password'];

    protected $universityIds = [
        2 => '-21322'
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function validateDocs()
    {
    	return $this->speciality->validateDocs();
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function getFullNameAttribute()
    {
        return $this->second_name . ' ' . $this->name . ' ' . $this->father_name;
    }

    public function sendtoTelegram()
    {
        $message = 'Подготовлен к переводу '. $this->fullName.' +998'. $this->phone;
        $apiToken = "1635700142:AAFI-KiSJqHfgpJuMRG5Uwf6jsmzBjJBK8k";
        $data = [
            'chat_id' => '-1001286932511',
            'text' => $message
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

        return $response;
    }

    public function sendToUniversity()
    {
        $message = 'Студент '. $this->fullName."\nНомер телефона: +998". $this->phone."\nФакультет: ". $this->speciality->faculty->name."\nСпециальность: ".$this->speciality->name;
        $apiToken = "11605689921:AAFImfHIHlJd1e5I_ru-luMH4_TbJDbb0Ys";
        $data = [
            'chat_id' => '-1001286932511',
            'text' => $message
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

        return $response;
    }
}
