<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Crypt;
use Cookie;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $cookie = Crypt::decrypt(Cookie::get('lang'), false);

        // dd($cookie);

        // if(isset($cookie) && !empty($cookie)) {
        //     App::setLocale($cookie); 
        // }else {
        //     $ip = \Request::ip();

        //     $geo = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

        //     if(isset($geo->country)){
        //         $country = $geo->country;

        //         $languages = [
        //             'RU' => 'ru',
        //             'UZ' => 'uz',
        //         ];

        //         if (array_key_exists($country, $languages)) {
        //             $lang = $languages[$country];
        //             App::setLocale($lang); 


        //         }
        //         else {
        //             App::setLocale(App::getLocale()); 
        //         }
        //     } else {
        //         App::setLocale(App::getLocale());
        //     }
        // }
    }
}
