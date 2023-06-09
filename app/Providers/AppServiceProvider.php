<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

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
        Paginator::useBootstrap();

Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
        $recaptchaResponse = $value;
       /** $recaptchaSecret = config('app.GOOGLE_RECAPTCH_SECRET'); */
	$recaptchaSecret = config('services.recaptcha.secret');



        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $recaptchaSecret,
                'response' => $recaptchaResponse,
            ],
        ]);

        $body = json_decode($response->getBody());
        return $body->success;
    });
    }
}
