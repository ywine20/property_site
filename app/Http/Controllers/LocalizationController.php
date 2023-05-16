<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    //
    Public function setLang($locale){
        App::setLocale($locale);
        Session::put('locale',$locale);
        return redirect()->back();

    }
}
