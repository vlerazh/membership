<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class LocalizationControlloer extends Controller
{
    public function index($lang){
        if (array_key_exists($lang, config('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
        // dd(Session::has('applocale'));
    }
}
