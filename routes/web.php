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
Route::view('/login','frontend.login.form')->name('login.form');
Route::post('/login-submit','LoginController@login')->name('login');
Route::post('/admin','LoginController@dashboard')->name('admin')->middleware('role:admin');
 
 



//Backend Routes
Route::view('dashboard','backend.dashboard')->name('dashboard');

//settings route
Route::get('settings',[SiteSettingController::class,'index'])->name('site.settings');
Route::post('settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');
 
Route::resource('assignments', 'AssignmentController');