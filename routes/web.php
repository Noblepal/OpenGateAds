<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/categories', [PagesController::class, 'categories']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/ad/{id}/details', [PagesController::class, 'adDetails']);
Route::get('/maintenance', [PagesController::class, 'maintenance']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/ad-post', [PagesController::class, 'postAd'])->name('postAd');
    Route::get('/account-myads', [PagesController::class, 'myAds'])->name('myAds');
    Route::get('/account-settings', [PagesController::class, 'settings'])->name('settings');
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/account-fav', [PagesController::class, 'favouriteAds'])->name('favouriteAds');
    Route::post('/updateProfile', [PagesController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/upload-post', [PagesController::class, 'uploadPost'])->name('uploadPost');
    Route::post('/fav-ad/{ad_id}', [PagesController::class, 'favoriteAd'])->name('favoriteAd');


});

