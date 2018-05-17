<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;
use Redirect;

class LanguageController extends Controller
{
    // To change the current language
    // Ajax
    // public function changeLanguage(Request $request) {
    //    if ($request->ajax()) {
    //        $request->session()->put('locale', $request->locale);
    //        $request->session()->flash('alert-success', ('app.Locale_Change_Success'));
    //    }
    //}
    public function index() {
        if(!\Session::has('locale')) {
            \Session::put('locale', Input::get('locale'));
        } else {
            Session::put('locale', input::get('locale'));
        }
        return Redirect::back();
    }

}
