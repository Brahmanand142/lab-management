<?php

use App\Http\Controllers\SiteSettingController;
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
//Frontend Routes
Route::get('/', function () {
    return view('frontend.index');
})->name('home');
//login
Route::get('/login', function () {
    return view('frontend.login.form'); // This points to resources/views/login/form.blade.php
})->name('login-form');
 //register
 
 



//Backend Routes
Route::view('dashboard','backend.dashboard')->name('dashboard');

//settings route
Route::get('settings',[SiteSettingController::class,'index'])->name('site.settings');
Route::post('settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');
 