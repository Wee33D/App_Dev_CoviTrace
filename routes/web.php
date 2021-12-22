<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

// Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);

Route::get('/patients', [PatientController::class, 'displayinfo'])->name('patients');

Route::get('/trackpatients', [PatientController::class, 'trackpatients']);

Route::get('deleteP/{id}', [PatientController::class, 'destroy']);
Route::get('viewP/{id}', [PatientController::class, 'view']);
Route::post('update_patient/{id}', [PatientController:: class, 'update']);

Route::get('/register1',[App\Http\Controllers\HealthAdminController::class, 'register1'])->name('register1');
Route::get('/register1',[App\Http\Controllers\HealthAdminController::class, 'displayAdmininfo']);
Route::post('/auth/save1',[App\Http\Controllers\HealthAdminController::class, 'save1'])->name('auth.save1');

Route::get('viewA/{id}', [App\Http\Controllers\HealthAdminController::class, 'view']);
Route::get('deleteA/{id}', [App\Http\Controllers\HealthAdminController::class, 'destroy']);
Route::post('update_admin/{id}', [App\Http\Controllers\HealthAdminController:: class, 'update']);


Route::get('/homemaster', function (){
    return view('/homemaster');
});