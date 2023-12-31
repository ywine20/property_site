<?php

use App\Http\Middleware\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PanoramaController;
use App\Http\Controllers\AlbumTestController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RedeemCodeController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\ProjectListController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PreviewImageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\Admin\SiteProgressController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PreviewImageController as AdminPreviewImageController;


Route::get('/', function () {
    return view('master');
});


    // Route::get('download-pdf', [ExportController::class, 'downloadPDF'])->name('download-pdf');
//localization
   Route::get('locale/{lang}', [LocalizationController::class, 'setLang']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/vouchers/{id}', [ProductController::class, 'voucher']);

//Login
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['Admin']], function () {
    Route::get('/', 'PageController@showDashboard');
    Route::post('/logout', 'PageController@logout');
    Route::get('/user', 'PageController@profile');
    Route::resource('category', "CategoryController");
    Route::resource('project', "ProjectController");
    Route::get('export', [ExportController::class, 'create'])->name('export.create');
    Route::get('export/excel', [ExportController::class, 'exportToExcel'])->name('export.excel');




    // Album
    Route::get('project/{projectId}/album/create', [AlbumController::class, 'create'])->name('albumTest.create');
    Route::post('project/{projectId}/album/store', [AlbumController::class, 'store'])->name('albumTest.store');
    Route::get('project/{projectId}/album/{id}', [AlbumController::class, 'show'])->name('albumTest.show');
    Route::patch('project/{projectId}/album/{id}', [AlbumController::class, 'update'])->name('albumTest.update');
    Route::delete('album/{id}', [AlbumController::class, 'albumDelete'])->name('album.delete');
    // Route::delete('album/{albumId}/images/{imageName}', [AlbumController::class, 'imageDelete'])->name('albumImage.delete');
    Route::delete('album/{albumId}/images/{imageName}', [AlbumController::class, 'imageDel'])->name('albumImage.delete');



    // Site Progress
    Route::get('project/{id}/detail/', [ProjectController::class, 'detail'])->name('project.detail');
    Route::get('project/{id}/site-progess/create', [SiteProgressController::class, 'create'])->name('siteProgress.create');
    Route::get('project/{projectId}/site-progess/{id}', [SiteProgressController::class, 'show'])->name('siteProgress.show');
    Route::post('project/{id}/site-progess/store', [SiteProgressController::class, 'store'])->name('siteProgress.store');
    Route::get('project/{projectId}/site-progess/{id}/edit', [SiteProgressController::class, 'edit'])->name('siteProgress.edit');
    Route::patch('project/{projectId}/site-progess/{id}/update', [SiteProgressController::class, 'update'])->name('siteProgress.update');
    Route::delete('project/{projectId}/site-progess/{id}/delete', [SiteProgressController::class, 'destroy'])->name('siteProgress.destory');
    Route::delete('site-progess/{siteProgressId}/image/{id}', [SiteProgressController::class, 'imageDelete'])->name('siteProgressImage.destory');


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
    Route::post('/delete-multiple-category', [\App\Http\Controllers\Admin\CategoryController::class, 'multiDelCategory'])->name('category.multi-delete');
    Route::post('/delete-multiple-amenity', [\App\Http\Controllers\Admin\AmenityController::class, 'multiDelAmenity'])->name('amenity.multi-delete');
    Route::post('/delete-multiple-project', [\App\Http\Controllers\Admin\ProjectController::class, 'multiDelProject'])->name('project.multi-delete');
    Route::post('/delete-multiple-facebookLink', [\App\Http\Controllers\Admin\FacebookLinkController::class, 'multiDelFacebookLink'])->name('facebookLink.multi-delete');
    Route::post('/delete-multiple-city', [\App\Http\Controllers\Admin\AddressController::class, 'multiDelCity'])->name('city.multi-delete');
    Route::post('/delete-multiple-town', [\App\Http\Controllers\Admin\AddressController::class, 'multiDelTown'])->name('town.multi-delete');
    Route::put('city-update/{id}', [\App\Http\Controllers\Admin\AddressController::class, 'cityUpdate'])->name('address.cityUpdate');
    Route::put('town-update/{id}', [\App\Http\Controllers\Admin\AddressController::class, 'townUpdate'])->name('address.townUpdate');

    Route::delete('/previewImages/{name}/{fieldName}', [AdminPreviewImageController::class, 'delete'])->name('previewImage.delete');

    //for redeem code
    Route::get('/redeemCodes/page', [RedeemCodeController::class, 'generateRedeemCodePage'])->name('admin.generateRedeemCodePage');
    Route::post('/redeemCodes', [RedeemCodeController::class, 'generateRedeemCode'])->name('admin.generateRedeemCode');

    //to customer list
    Route::get('/customers/list', [CustomerController::class, 'customersList'])->name('admin.customersList');
    Route::get('/customers/{id}', [CustomerController::class, 'customerDetail'])->name('admin.customerDetail');

});




//SMT UPDATE 13-March-2023

Route::group([], function () {

    Route::get('/profile/{id}', [CustomerProfileController::class, 'profile'])->name('profile');

    Route::get('/profile/{id}/setting', [CustomerProfileController::class, 'profileSetting'])->name('profile.setting');
    Route::get('/profile/{id}/redeem', [CustomerProfileController::class, 'redeem'])->name('profile.redeem');
    Route::post('/profile/{id}/changeProfile', [CustomerProfileController::class, 'changeImage'])->name('profile.changeImge');
    Route::patch('/profile/{id}/changeProfileInfo', [CustomerProfileController::class, 'changeInfo'])->name('profile.changeInfo');
    Route::patch('/profile/{id}/changePassword', [CustomerProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/forgotpassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::get('project/{projectId}/siteprogress', [ProjectListController::class, 'siteProgressList'])->name('siteProgressList');
    Route::get('project/{projectId}/siteprogress/{id}', [ProjectListController::class, 'siteProgressDetail'])->name('client-siteProgress.show');
    Route::get('project/{projectId}/album/{id}', [ProjectListController::class, 'albumDetail'])->name('client-album.show');



    // Route::view('/profile','customer/profile')->name('profile');

    Route::view('/profile/setting', 'customer/profile-setting')->name('profile-setting');
    Route::view('/redeem', 'customer/redeem')->name('profile-redeem');


    // Redeem Code for customemr
    Route::post('/customer/redeemCodes', [RedeemCodeController::class, 'customerRedeemCodes'])->name('profile.customerRedeemCodes');


    //winwinmaw
    Route::get('/redeemCode', [RedeemCodeController::class, 'generateCode'])->name('profile.generateCode');
    Route::post('/code', [RedeemCodeController::class, 'code'])->name('profile.code');
    // Route::get('locale/{lang}', [LocalizationController::class, 'setLang']);

});

Route::view('/multiple-selected', 'test');
