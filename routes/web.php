<?php

use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SmsController;
 
 
 
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
Route::post('signup','LoginController@signup')->name('signup');
Route::view('/login','frontend.login.form')->name('login.form');
Route::post('/login-submit','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::view('/register/form', 'backend.register.register')->name('assign.register');
 Route::post('/admin/register', [RegistrationController::class, 'register'])->name('admin.register');// not done yet


// Admin Routes
Route::middleware('role:admin')->prefix('admin')->group(function () {
Route::get('/', 'LoginController@dashboardadmin')->name('admin');
Route::resource('faculties', FacultyController::class);
Route::resource('/admin/lab', 'LabController');
Route::get('std_record', 'StudentController@show')->name('student.record');
// Route::view('/register','RegistrationController@login')->name('register'); // for registering teachers and other admin in admin panel
  Route::resource('teachers', TeacherController::class)->names([ // Note 'table/teacher' singular URI
        'create' => 'backend.teacher.create',
        'index' => 'backend.teacher.index',
        'store' => 'backend.teacher.store',
        'show' => 'backend.teacher.show',
        'edit' => 'backend.teacher.edit',
        'update' => 'backend.teacher.update',
        'destroy' => 'backend.teacher.destroy',
    ]);
});

 
// Teacher Routes
Route::middleware('role:teacher')->prefix('teacher')->group(function () {
Route::get('/', 'LoginController@dashboardteacher')->name('teacher.dashboard');
Route::resource('assignment', 'AssignmentController');
Route::resource('lab', 'LabController');
Route::get('teacher/profile', 'TeacherController@create')->name('teacher.profile');
Route::resource('table/students', StudentController::class)->names([ // Note 'table/teacher' singular URI
        'create' => 'teacher.student.create',    
        'index' => 'teacher.student.index',
        'store' => 'teacher.student.store',
        'show' =>'teacher.student.show',
        'edit' => 'teacher.student.edit',
        'update' => 'teacher.student.update',
        'destroy' => 'teacher.student.destroy',
    ]);
 
});
 
 

//Students Routes
Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
Route::get('/dashboard', 'LoginController@dashboardstudent')->name('student.dashboard');
Route::resource('assignment-submission', 'StudentAssignmentController');
});

// User Routes
Route::middleware('role:user')->prefix('user.dashboard')->group(function () {
     Route::get('/dashboard', 'LoginController@dashboarduser')->name('user.dashboard');
});


//Backend Routes
Route::view('dashboard','backend.dashboard')->name('dashboard');

Route::get('site-settings',[SiteSettingController::class,'index'])->name('site.settings');
Route::post('site-settings/update',[SiteSettingController::class,'update'])->name('site.settings.update');


//AI integration don't touch it please
Route::post('/gemini/prompt', [GeminiController::class, 'handlePrompt']);
 
// //register
// Route::view('/register','frontend.register.registration')->name('register.registration');
// Route::post('/register','RegistrationController@login')->name('register');




//Auth related routes
Route::view('/password-reset','frontend.login.reset-form')->name('password.reset');
Route::post('/password-reset-submit','LoginController@resetPassword')->name('password.reset.submit');
Route::post('/update-password','LoginController@updatePassword')->name('password.reset.update');
Route::get('/password-reset-form/{token}','LoginController@showResetForm')->name('password.reset.link');

//sms route
Route::get('/test-sms','SmsController@sendSms')->name('sms');

//AI

Route::view('/ai','ai')->name('ai');


 

