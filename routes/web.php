<?php

use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\RegistrationController;
 
 
 
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
  Route::resource('lab', 'LabController');
  Route::resource('students', 'StudentController');
   
// Route::view('/register','RegistrationController@login')->name('register'); // for registering teachers and other admin in admin panel
Route::get('teachers/index', 'TeacherController@index')->name('table.teacher.index');
  Route::resource('table/teacher', TeacherController::class)->names([ // Note 'table/teacher' singular URI
        'create' => 'table.teacher.create',
        'index' => 'table.teacher.index',
        'store' => 'table.teacher.store',
        'show' => 'table.teacher.show',
        'edit' => ' table.teacher.edit',
        'update' => 'table.teacher.update',
        'destroy' => 'table.teacher.destroy',
    ]);
});

 
// Teacher Routes
Route::middleware('role:teacher')->prefix('teacher')->group(function () {
Route::get('/', 'LoginController@dashboardteacher')->name('teacher.dashboard');
Route::resource('assignment', 'AssignmentController');
Route::resource('lab', 'LabController');
Route::get('teacher/profile', 'TeacherController@create')->name('teacher.profile');
Route::get('student/index', 'StudentController@index')->name('student.index'); 
Route::resource('table/student', StudentController::class)->names([ // Note 'table/teacher' singular URI
        'create' => 'table.student.create',    
        'index' => 'table.student.index',
        'store' => 'table.student.store',
        'show' => 'table.student.show',
        'edit' => 'student.edit',
        'update' => 'table.student.update',
    ]);
 Route::delete('/teacher/student/{student}', 'StudentController@destroy')->name('student.destroy');
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
