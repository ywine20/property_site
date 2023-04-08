<?php

use App\Http\Controllers\Admin\PreviewImageController as AdminPreviewImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\ContactUsController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\RedeemCodeController;
use App\Models\CustomerProfile;
// use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\EngagementController;
use App\Http\Controllers\PreviewImageController;
use App\Http\Controllers\ProjectListController;


// Route::get('/{lang}',function ($lang){
//     App::setlocale($lang);
//     return view('master');
// });

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/vouchers/{id}',[ProductController::class,'voucher']);

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


Route::get('admin/site',[SiteController::class,'siteindex'])->name('save-sitepost-gallery');
Route::post('admin/site',[SiteController::class, 'sitesave']);
Route::delete('/site-gallery/{id}', [SiteController::class,'sitedelete'])->name('delete-site-gallery');

Route::get('admin/album',[AlbumController::class, 'index'])->name('save-multipel-imgae');
Route::post('admin/album',[AlbumController::class, 'save']);




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

    Route::delete('/previewImages/{name}/{fieldName}',[AdminPreviewImageController::class,'delete'])->name('previewImage.delete');




});   


//SMT UPDATE 13-March-2023

Route::get('/profile/{id}',[CustomerProfileController::class,'profile'])->name('profile');
Route::get('/profile/{id}/setting',[CustomerProfileController::class,'profileSetting'])->name('profile.setting');
Route::get('/profile/{id}/redeem',[CustomerProfileController::class,'redeem'])->name('profile.redeem');
Route::post('/profile/{id}/changeProfile',[CustomerProfileController::class,'changeImage'])->name('profile.changeImge');
Route::patch('/profile/{id}/changeProfileInfo',[CustomerProfileController::class,'changeInfo'])->name('profile.changeInfo');
Route::patch('/profile/{id}/changePassword',[CustomerProfileController::class,'changePassword'])->name('profile.changePassword');
Route::post('/',[AuthController::class,'forgotPassword'])->name('forgotPassword');




// Route::view('/profile','customer/profile')->name('profile');

Route::view('/profile/setting','customer/profile-setting')->name('profile-setting');
Route::view('/redeem','customer/redeem')->name('profile-redeem');


//for redeem code
Route::get('/redeemCodes/page', [RedeemCodeController::class,'generateRedeemCodePage'])->name('profile.generateRedeemCodePage');
Route::post('/redeemCodes', [RedeemCodeController::class,'generateRedeemCode'])->name('profile.generateRedeemCode');
=======


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
