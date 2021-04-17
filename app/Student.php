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

    protected $types = [
        0 => 'Очное',
        1 => 'Заочное',
        2 => 'Онлайн',
        3 => 'Вечернее',
        4 => 'По выходным',
        5 => 'очное-заочное',
        6 => 'вечернее(для 11 классов)',
        7 => 'вечернее(для колледжей)',
        8 => 'вечернее и выходное, очное',
        9 => 'вечернее и выходное, заочное',
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function validateDocs()
    {
        return $this->speciality->validateDocs();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function getFullNameAttribute()
    {
        return $this->second_name . ' ' . $this->name . ' ' . $this->father_name;
    }

    public function getShNumberAttribute()
    {
        if(!$this->service_date){
            return '--';
        }

        return date('Y', strtotime($this->service_date)) . '/' . $this->id;
    }

    public function getTypeNAttribute()
    {        
        if($this->type){
            return $this->types[$this->type];
        }
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

    public function checkRussia()
    {
        if($this->speciality->faculty->university->country->currency == 'RUB'){
            return true;
        }

        return false;
    }
}
