<?php

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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');


//Backend Routes
Route::view('dashboard','backend.dashboard');

    route::get('/sitesetting', function () {
         return view('backend.sitesettings'); // Assuming you have a view file named sitesettings.blade.php
})->name('backend.sitesetting');
 
 