<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;

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


Route::get('/products',[ProductController::class,'index']);
Route::get('/products/vouchers/{id}',[ProductController::class,'voucher']);


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
    // Route::resource('contact', "ContactController");
    // Route::delete('/deletecover/{id}', "ProjectController@deletecover");
    //Route::delete('/delete/{id}',[ProjectController::class,'destroy']);
/******************************************************************************************/
    // For Gallery Route
    // Route::get('gallery',[GalleryController::class,'index']);
    // Route::get('add-photo',[GalleryController::class,'create']);
    // Route::post('add-photo',[GalleryController::class,'store']);
    // Route::get('edit-gallery/{id}',[GalleryController::class,'edit']);
    // Route::put('update-gallery/{id}',[GalleryController::class,'update']);
    // Route::get('delete-gallery/{id}',[GalleryController::class,'destroy']);
    // Route::get('show-gallery/{id}',[GalleryController::class,'show']);

    // For Address Route
    // Route::get('address',[AddressController::class,'index']);
    // Route::get('add-address',[AddressController::class,'create']);
    // Route::post('add-address',[AddressController::class,'store']);
    // Route::get('edit-address/{id}',[AddressController::class,'edit']);
    // Route::put('update-address/{id}',[AddressController::class,'update']);
    // Route::get('delete-address/{id}',[AddressController::class,'destory']);
    // Route::get('show-address/{id}',[AddressController::class,'show']);

    //for Slider
    // Route::get('slider',[SliderController::class,'index']);
    // Route::get('add-slider',[SliderController::class,'create']);
    // Route::post('add-slider',[SliderController::class,'store']);
    // Route::get('edit-slider/{id}',[SliderController::class,'edit']);
    // Route::put('update-slider/{id}',[SliderController::class,'update']);
    // Route::get('show-slider/{id}',[SliderController::class,'show']);
    // Route::get('delete-slider/{id}',[SliderController::class,'destory']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/hello', function(){
//     // Session::put('message', 0);
//     $message = Session::get('message');
//     $message += 1;
//     Session::put('message', $message);
//     // echo Session::get('message');
// });
