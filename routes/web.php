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
// Route::post('customlogin', 'Pages@customLogin')->name('login');
// Route::post('logout', 'Pages@signOut')->name('logout');
// Route::get('scan', function () {
// return view('users.staffs.attendance.scanned');
// });


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::post('generate-AES', 'EncryptionController@makeAES')->name('encryptAES');
Route::post('embed-steganography','EncryptionController@steganogagraphy' )->name('embed-with-stego');
Route::post('decrypt-message', 'EncryptionController@decryptStego')->name('decrypt');
// staffs routes

// end of staff routes
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
