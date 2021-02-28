<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Cookie;

class LanguageController extends Controller
{
		public function index($lang) {

          $languages = ['uz','ru'];


          if(in_array($lang, $languages)) {
          		// \Cookie::queue(\Cookie::make('lang', $lang, '20160'));
          	App::setLocale($lang);
          	session()->put('lang', $lang);

			return back();

          } else {
              //We use this for good measure
              //Set default language
              App::setLocale(App::getLocale()); 
              //Redirect back
              return back();
          }

      }
}
