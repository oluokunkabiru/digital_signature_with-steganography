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
    Route::get('dashboard', 'staffs\staffController@index')->name('staffDashboard');
    Route::resource('courses-and-classes', 'staffs\courseController');
    Route::resource('student-info', 'staffs\studentController');
    Route::resource('faculty', 'staffs\facultyController');
    Route::resource('department-info', 'staffs\deptController');
    Route::resource('attendance', 'staffs\attendanceController');
    Route::post('selectfaculty', 'staffs\courseController@selesctFaculty')->name('selectFaculty');
    Route::post('selectdept', 'staffs\courseController@selesctDept')->name('selectdept');
    Route::post('selectlevel', 'staffs\courseController@selesctLevel')->name('selectlevel');
    Route::get('/today-attendance', 'staffs\attendanceController@showTodaysAttendance')->name('todayAttendance');
    Route::get('todays-class', 'staffs\attendanceController@showTodaysClass')->name('todaysClass');

});

Route::prefix('students')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', 'students\studentController@index')->name('studentDashboard');
    Route::get('course-taken', 'students\studentController@courseTaken')->name('courseTaken');
    Route::resource('student-attendance', 'students\studentAttendance');
    Route::post('/scanning-QRcode', 'students\studentController@scanninigQRcode')->name('scanningqrcode');



});


// staffs routes

// end of staff routes
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
