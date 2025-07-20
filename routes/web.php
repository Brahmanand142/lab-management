<?php

use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\GeminiController;
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
Route::post('signup','LoginController@signup')->name('signup');
Route::view('/login','frontend.login.form')->name('login.form');
Route::post('/login-submit','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');


// Admin Routes
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/', 'LoginController@dashboardadmin')->name('admin');
    Route::post('/register','RegistrationController@login')->name('register'); // for registering teachers and other admin in admin panel
});

// Teacher Routes
Route::middleware('role:teacher')->prefix('teacher')->group(function () {
     Route::get('/', 'LoginController@dashboardteacher')->name('teacher.dashboard');
    Route::resource('assignment', 'AssignmentController');
    Route::resource('lab', 'LabController');
    Route::resource('faculties', FacultyController::class);
});
 
// User Routes
Route::middleware('role:user')->prefix('user.dashboard')->group(function () {
     Route::get('/', 'LoginController@dashboarduser')->name('user.dashboard');
});
 




//Backend Routes
Route::view('dashboard','backend.dashboard')->name('dashboard');
Route::view('/register', 'backend.register')->name('register');

//settings route
// Route::get('settings',[SiteSettingController::class,'index'])->name('site.settings');
// Route::post('settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');
Route::get('site-settings',[SiteSettingController::class,'index'])->name('site.settings');
Route::post('site-settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');


//AI integration don't touch it please
Route::post('/gemini/prompt', [GeminiController::class, 'handlePrompt']);
 

