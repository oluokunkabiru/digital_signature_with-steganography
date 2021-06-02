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

Auth::routes();

Route::prefix('staffs')->middleware(['auth', 'staff'])->group(function () {
    Route::get('dashboard', 'staffs\staffController@index')->name('staffDashboard');
    Route::resource('courses-and-classes', 'staffs\courseController');
    Route::resource('student-info', 'staffs\studentController');
    Route::resource('faculty', 'staffs\facultyController');
    Route::resource('department-info', 'staffs\deptController');
    Route::resource('attendance', 'staffs\attendanceController');
});

Route::prefix('students')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', 'students\studentController@index')->name('studentDashboard');
    Route::get('course-taken', 'students\studentController@courseTaken')->name('courseTaken');
    Route::resource('student-attendance', 'students\studentAttendance');

});


// staffs routes

// end of staff routes
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
