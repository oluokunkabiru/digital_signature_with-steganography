<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'Pages@index')->name('welcome');
Route::post('customlogin', 'Pages@customLogin')->name('login');
Route::post('logout', 'Pages@signOut')->name('logout');
Route::get('scan', function () {
return view('users.staffs.attendance.scanned');
});


// Auth::routes();
// Authentication url
// Route::get('/', 'Auth\AuthController@showLoginForm');
    // Route::post('login', 'Auth\AuthController@login');
    // Route::get('logout', 'Auth\AuthController@logout');



Route::prefix('staffs')->middleware(['auth', 'staff'])->group(function () {
    Route::get('dashboard', 'Staffs\StaffController@index')->name('staffDashboard');
    Route::resource('staffs-info', 'Staffs\StaffController');
    Route::get('manage-staffs', 'Staffs\StaffController@staffsInfo')->name('manage-staffs');
    Route::resource('courses-and-classes', 'Staffs\CourseController');
    Route::resource('student-info', 'Staffs\StudentController');
    Route::resource('faculty', 'Staffs\FacultyController');
    Route::resource('department-info', 'Staffs\DeptController');
    Route::resource('attendance', 'Staffs\AttendanceController');
    Route::post('selectfaculty', 'Staffs\CourseController@selesctFaculty')->name('selectFaculty');
    Route::post('selectdept', 'Staffs\CourseController@selesctDept')->name('selectdept');
    Route::post('selectlevel', 'Staffs\CourseController@selesctLevel')->name('selectlevel');
    Route::get('/today-attendance', 'Staffs\AttendanceController@showTodaysAttendance')->name('todayAttendance');
    Route::get('todays-class', 'Staffs\AttendanceController@showTodaysClass')->name('todaysClass');

});

Route::prefix('students')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', 'Students\StudentController@index')->name('studentDashboard');
    Route::get('course-taken', 'Students\StudentController@courseTaken')->name('courseTaken');
    Route::resource('student-attendance', 'Students\studentAttendance');
    Route::post('/scanning-QRcode', 'Students\StudentController@scanninigQRcode')->name('scanningqrcode');



});


// staffs routes

// end of staff routes
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
