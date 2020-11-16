<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/categories', [PagesController::class, 'categories'])->name('categories');
Route::get('/listings', [PagesController::class, 'listings'])->name('listings');
Route::get('/rejected', [PagesController::class, 'rejected'])->name('rejected');
Route::get('/missed', [PagesController::class, 'missed'])->name('missed');
Route::get('/category/{id}/listings', [PagesController::class, 'categoryListings'])->name('categoryListings');
Route::get('/location/{name}/listings', [PagesController::class, 'locationListings'])->name('locationListings');
Route::get('/seller/{id}/listings', [PagesController::class, 'sellerListings'])->name('sellerListings');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/ad/{id}/details', [PagesController::class, 'adDetails'])->name('adDetails');
Route::post('/require/login', [PagesController::class, 'ajaxLogin'])->name('ajaxLogin');
Route::get('/maintenance', [PagesController::class, 'maintenance']);
Route::get('/pesapal-ipn-listener', [PaymentController::class, 'PesapalIPNListener']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/ad-post', [PagesController::class, 'postAd'])->name('postAd');
    Route::get('/account-myads', [PagesController::class, 'myAds'])->name('myAds');
    Route::get('/pending-ads', [PagesController::class, 'pendingPending'])->name('pendingPending');
    Route::get('/account-settings', [PagesController::class, 'settings'])->name('settings');
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/account-fav', [PagesController::class, 'favouriteAds'])->name('favouriteAds');
    Route::get('/Profile-settings', [PagesController::class, 'profileSettings'])->name('profileSettings');
    Route::post('/updateProfile', [PagesController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/upload-post', [AdController::class, 'uploadPost'])->name('uploadPost');
    Route::post('/update-post', [AdController::class, 'updatePost'])->name('updatePost');
    Route::get('/edit-post/{id}', [AdController::class, 'editPost'])->name('editPost');
    Route::delete('/delete-post', [AdController::class, 'deletePost'])->name('deletePost');
    Route::delete('/delete-ad-photo', [AdController::class, 'photoDestroy'])->name('photoDestroy');
    Route::post('/fav-ad', [AdController::class, 'favoriteAd'])->name('favoriteAd');
    Route::get('/PesaInit/{ad_id}', [PaymentController::class, 'PesaInit'])->name('PesaInit');
    Route::get('/PesaExecute', [PaymentController::class, 'PesaExecute'])->name('PesaExecute');

    Route::group(['middleware' => 'role:Super Admin'], function () {
        /*Admin*/
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/ads', [HomeController::class, 'adsIndex'])->name('admin.ads');
        Route::get('/admin/ads/{id}/edit', [HomeController::class, 'adsEdit'])->name('admin.ads.edit');
        Route::get('/admin/ads/update', [HomeController::class, 'adsUpdate'])->name('admin.ads.update');
        Route::delete('/admin/ads/delete', [HomeController::class, 'adsDelete'])->name('admin.ads.delete');
        Route::post('/admin/ads/activate', [HomeController::class, 'adsActivate'])->name('admin.ads.activate');
        Route::post('/admin/ads/feature', [HomeController::class, 'adsFuture'])->name('admin.ads.feature');

        Route::get('/admin/categories', [HomeController::class, 'CategoryIndex'])->name('admin.categories');
        Route::post('/admin/category/add', [HomeController::class, 'CategoryAdd'])->name('admin.category.add');
        Route::get('/admin/category/{id}/edit', [HomeController::class, 'CategoryEdit'])->name('admin.category.edit');
        Route::post('/admin/category/update', [HomeController::class, 'CategoryUpdate'])->name('admin.category.update');
        Route::delete('/admin/category/delete', [HomeController::class, 'CategoryDelete'])->name('admin.category.delete');

        Route::get('/admin/users', [HomeController::class, 'userIndex'])->name('admin.users');
        Route::post('/admin/user/add', [HomeController::class, 'AdminSideRegister'])->name('admin.user.add');
        Route::get('/admin/user/{id}/edit', [HomeController::class, 'UserEdit'])->name('admin.user.edit');
        Route::post('/admin/user/update', [HomeController::class, 'AdminUserUpdate'])->name('admin.user.update');
        Route::delete('/admin/user/delete', [HomeController::class, 'UserDelete'])->name('admin.user.delete');
        Route::get('/admin/user/{id}/ads', [HomeController::class, 'UserAds'])->name('admin.user.ads');

        Route::resource('roles', '\App\Http\Controllers\RoleController');

    });
});

Route::get('/clear-cache', function () {
     Artisan::call('config:cache');
     Artisan::call('route:clear');
     Artisan::call('view:clear');
    return 'Success';
});

