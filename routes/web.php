<?php

use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\GeminiController;
use Illuminate\Support\Facades\Mail;
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
//     Mail::raw('Test.', function ($message) {
//     $message->from('your_email@example.com', 'Your Name')->
//     to('recipient@example.com')
//             ->subject('Simple Email Subject');
// });
    return view('frontend.index');
})->name('home');



//login
Route::view('/login','frontend.login.form')->name('login.form');
Route::post('/login-submit','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::post('/signup', 'RegistrationController@register')->name('signup');  

// Admin Routes
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/', 'LoginController@dashboardadmin')->name('admin');
    // Add more admin-specific routes here
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

//settings route
// Route::get('settings',[SiteSettingController::class,'index'])->name('site.settings');
// Route::post('settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');
Route::get('site-settings',[SiteSettingController::class,'index'])->name('site.settings');
Route::post('site-settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');


//AI integration don't touch it please
Route::post('/gemini/prompt', [GeminiController::class, 'handlePrompt']);
 
//register
Route::view('/register','frontend.register.registration')->name('register.registration');
Route::post('/register','RegistrationController@login')->name('register');




//Auth related routes
Route::view('/password-reset','reset-form')->name('password.reset');
Route::get('/password-reset-submit','LoginController')->name('password.reset.submit');