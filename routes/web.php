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
Route::post('signup','LoginController@signup')->name('signup');
Route::view('/login','frontend.login.form')->name('login.form');
Route::post('/login-submit','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::view('/register/form', 'backend.register')->name('register');
 Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register');


// Admin Routes
Route::middleware('role:admin')->prefix('admin')->group(function () {
Route::get('/', 'LoginController@dashboardadmin')->name('admin');
 Route::resource('faculties', FacultyController::class);
  Route::resource('lab', 'LabController');
   
// Route::view('/register','RegistrationController@login')->name('register'); // for registering teachers and other admin in admin panel
Route::get('teachers/index', 'TeacherController@index')->name('table.teacher.index');
  Route::resource('table/teacher', TeacherController::class)->names([ // Note 'table/teacher' singular URI
        'create' => ' backend.table.teacher.create',
        'index' => 'backend.table.teacher.index',
        'store' => 'backend.table.teacher.store',
        'show' => 'backend.table.teacher.show',
        'edit' => ' backend.table.teacher.edit',
        'update' => 'backendtable.teacher.update',
        'destroy' => 'backend.table.teacher.destroy',
    ]);
});

 


// Teacher Routes
Route::middleware('role:teacher')->prefix('teacher')->group(function () {
     Route::get('/', 'LoginController@dashboardteacher')->name('teacher.dashboard');
    Route::resource('assignment', 'AssignmentController');
 Route::resource('lab', 'LabController');
    Route::get('teacher/profile', 'TeacherController@create')->name('teacher.profile');
});
 

//Students Routes
Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
     Route::get('/dashboard', 'LoginController@dashboardstudent')->name('student.dashboard');
});

// User Routes
Route::middleware('role:user')->prefix('user.dashboard')->group(function () {
     Route::get('/dashboard', 'LoginController@dashboarduser')->name('user.dashboard');
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
Route::view('/password-reset','frontend.login.reset-form')->name('password.reset');
Route::post('/password-reset-submit','LoginController@resetPassword')->name('password.reset.submit');
