<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerProfileController;
use App\Models\CustomerProfile;

// use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\EngagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


//User
Route::resource('/user',"UserController");



/*
 Client Site and User View Point Routes
*/
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('projectlist', [App\Http\Controllers\ProjectListController::class, 'projectlist'])->name('projectlist');
Route::get('/projectlist/advance', [App\Http\Controllers\ProjectListController::class, 'advance'])->name('advance');
Route::get('/projectlist/search', [App\Http\Controllers\ProjectListController::class, 'search'])->name('search');

Route::get('aboutus', function () {
    return view('aboutus');
});
Route::get('faq', [App\Http\Controllers\AboutUsController::class, 'faq'])->name('faq');
Route::get('termcondition', [App\Http\Controllers\AboutUsController::class, 'termcondition'])->name('termcondition');
Route::get('dprofile', [App\Http\Controllers\AboutUsController::class, 'dprofile'])->name('dprofile');
Route::get('detail/{id}', [WelcomeController::class, 'detail']);
Route::get('detail/{id}', [ProjectListController::class, 'detail']);
Route::get('panorama/{id}', [PanoramaController::class, 'panorama']);
Route::get('/contactus', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contactus', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');
/*...............................................................................................*/

/* This is Admin Route
 **Not For All and Users**
 **We keep locker by using db-site**
*/
Route::get('/admin/login', 'Admin\PageController@showLogin');
Route::post('/admin/login', 'Admin\PageController@login');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>['Admin']], function(){
    Route::get('/', 'PageController@showDashboard');
    Route::post('/logout', 'PageController@logout');
    Route::get('/user', 'PageController@profile');
    Route::resource('category', "CategoryController");
    Route::resource('project', "ProjectController");
    Route::resource('amenity', "AmenityController");
    Route::resource('facebooklink', "FacebookLinkController");
    Route::resource('citystate', "CityStateController");
    Route::resource('township', "TownController");
    Route::resource('slider', "SliderController");
    Route::resource('setting', "AdminController");
    Route::delete('/deleteimage/{id}', "ProjectController@deleteimage");
    Route::get('address', 'AddressController@address');
    Route::get('add-city', 'AddressController@cityCreate');
    Route::post('add-city', 'AddressController@cityStore');
    Route::get('add-town', 'AddressController@townCreate');
    Route::post('add-town', 'AddressController@townStore');
    Route::delete('delete-city/{id}', 'AddressController@destroy');
    Route::delete('delete-town/{id}', 'AddressController@delete');
    Route::get('contact', 'ContactController@index');
    Route::get('cont-show/{id}', 'ContactController@detail');
    Route::delete('cont-show/cont-delete/{id}', 'ContactController@delete');

    //winwinmawModify
    Route::post('/delete-multiple-category',[\App\Http\Controllers\Admin\CategoryController::class,'multiDelCategory'])->name('category.multi-delete');
    Route::post('/delete-multiple-amenity',[\App\Http\Controllers\Admin\AmenityController::class,'multiDelAmenity'])->name('amenity.multi-delete');
    Route::post('/delete-multiple-project',[\App\Http\Controllers\Admin\ProjectController::class,'multiDelProject'])->name('project.multi-delete');
    Route::post('/delete-multiple-facebookLink',[\App\Http\Controllers\Admin\FacebookLinkController::class,'multiDelFacebookLink'])->name('facebookLink.multi-delete');
    Route::post('/delete-multiple-city',[\App\Http\Controllers\Admin\AddressController::class,'multiDelCity'])->name('city.multi-delete');
    Route::post('/delete-multiple-town',[\App\Http\Controllers\Admin\AddressController::class,'multiDelTown'])->name('town.multi-delete');
    Route::put('city-update/{id}',[\App\Http\Controllers\Admin\AddressController::class,'cityUpdate'])->name('address.cityUpdate');
    Route::put('town-update/{id}',[\App\Http\Controllers\Admin\AddressController::class,'townUpdate'])->name('address.townUpdate');


});
   


//SMT UPDATE 13-March-2023

Route::get('/profile/{id}',[CustomerProfileController::class,'profile'])->name('profile');
Route::get('/profile/{id}/setting',[CustomerProfileController::class,'profileSetting'])->name('profile.setting');
Route::get('/profile/{id}/redeem',[CustomerProfileController::class,'redeem'])->name('profile.redeem');
Route::post('/profile/{id}/changeProfile',[CustomerProfileController::class,'changeImage'])->name('profile.changeImge');
Route::patch('/profile/{id}/changeProfileInfo',[CustomerProfileController::class,'changeInfo'])->name('profile.changeInfo');
Route::patch('/profile/{id}/changePassword',[CustomerProfileController::class,'changePassword'])->name('profile.changePassword');
Route::post('/forgotpassword',[AuthController::class,'forgotPassword'])->name('forgotPassword');




// Route::view('/profile','customer/profile')->name('profile');

Route::view('/profile/setting','customer/profile-setting')->name('profile-setting');
Route::view('/redeem','customer/redeem')->name('profile-redeem');


