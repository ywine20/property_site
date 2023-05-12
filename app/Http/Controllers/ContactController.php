<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


class ContactController extends Controller
{
    public function contactForm(Request $request)
    {
        $currentURL = URL::current();
        // substr($string, $startPosition,$lengthOfSubstring);
        $string = $currentURL;
            if(substr($string, 0, 24) === "https://sunmyattunmm.com"){
                // echo "The URL starts with the desired URL.";
                $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
                $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

                if (!$check_if_exists || ($check_date->count()) < 1) {
                    $visitor = new Visitor();
                    $visitor->url = $request->url();
                    $visitor->ip_address = $request->ip();
                    $visitor->session_id = $request->getSession()->getId();
                    $visitor->user_agent = $request->header('User-Agent');
                    $visitor->visited_date = Carbon::now();
                    $visitor->save();
                }

                Session::push('visited_user', request()->getSession()->getId());
            }else if(substr($string, 0, 28) === "https://www.sunmyattunmm.com") {
                 // echo "The URL starts with the desired URL.";
                 $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
                 $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

                 if (!$check_if_exists || ($check_date->count()) < 1) {
                     $visitor = new Visitor();
                     $visitor->url = $request->url();
                     $visitor->ip_address = $request->ip();
                     $visitor->session_id = $request->getSession()->getId();
                     $visitor->user_agent = $request->header('User-Agent');
                     $visitor->visited_date = Carbon::now();
                     $visitor->save();
                 }

                 Session::push('visited_user', request()->getSession()->getId());
            }else{
                 // echo "The URL starts with not the desired URL.";
            }
        return view('contactForm');
    }

    public function storeContactForm(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
//            'subject'=>'required|max:100',
//            'message' => 'required|max:255',
//            'g-recaptcha-response' => function ($attribute, $value, $fail) {
//                $secretKey = config('services.recaptcha.secret');
//                $response = $value;
//                $userIP = $_SERVER['REMOTE_ADDR'];
//                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
//                $response = \file_get_contents($url);
//                $response = json_decode($response);
//                if(!$response->success){
//                    Session::flash('g-recaptcha-response', 'please check reCaptcha.');
//                    Session::flash('alert-class', 'alert-danger');
//                    $fail($attribute.'google reCaptcha fail');
//                }
//            },
//        ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'subject'=>'required|max:100',
            'message' => 'required|max:500',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret');
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                    Session::flash('g-recaptcha-response', 'please check reCaptcha.');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute.'google reCaptcha fail');
                }
            },
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with(['success' => 'Thank You For Sending Message']);
    }
}
