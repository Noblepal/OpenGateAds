<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdController;
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
Route::get('/category/{id}/listings', [PagesController::class, 'categoryListings'])->name('categoryListings');
Route::get('/location/{name}/listings', [PagesController::class, 'locationListings'])->name('locationListings');
Route::get('/seller/{id}/listings', [PagesController::class, 'sellerListings'])->name('sellerListings');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/ad/{id}/details', [PagesController::class, 'adDetails'])->name('adDetails');
Route::post('/require/login', [PagesController::class, 'ajaxLogin'])->name('ajaxLogin');
Route::get('/maintenance', [PagesController::class, 'maintenance']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/ad-post', [PagesController::class, 'postAd'])->name('postAd');
    Route::get('/account-myads', [PagesController::class, 'myAds'])->name('myAds');
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


});

