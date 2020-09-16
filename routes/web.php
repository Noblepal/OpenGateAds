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
Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/ad-post', [PagesController::class, 'postAd']);
Route::get('/account-fav', [PagesController::class, 'favouriteAds']);
Route::get('/account-myads', [PagesController::class, 'myAds']);
Route::get('/account-settings', [PagesController::class, 'settings']);
Route::get('/ad/{id}/details', [PagesController::class, 'adDetails']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


