<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CregisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PloginController;
use App\Http\Controllers\PregisterController;
use App\Http\Controllers\PappointmentController;
use App\Http\Controllers\CappointmentController;
use App\Http\Controllers\ClinicsController;
use Illuminate\Http\Request;

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
/*
Route::get('/patient-login', function () {
    return view('Patient.Plogin');
});
Route::get('/patient-sign', function () {
    return view('Patient.Pregister');
});
Route::get('/clinic-sign', function () {
    return view('Clinic.Cregister');
});
Route::get('/clinic-login', function () {
    return view('Clinic.CLogin');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/book', function () {
    return view('book');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', function () {
    return view('home');
});
*/
Route::get('/', function () {
    return view('about');
});
Route::resource('/home', 'App\Http\Controllers\HomeController');
Route::resource('/clinic-sign', 'App\Http\Controllers\CregisterController');
Route::resource('/clinic-login', 'App\Http\Controllers\CloginController');
Route::resource('/contact', 'App\Http\Controllers\ContactController');
Route::resource('/patient-sign', 'App\Http\Controllers\PregisterController');
Route::resource('/patient-login', 'App\Http\Controllers\PloginController');
Route::resource('/clinic-info', 'App\Http\Controllers\ClinicsController');

Route::group(['middleware' => 'login'], function(){
    Route::resource('/patient-appointment', 'App\Http\Controllers\PappointmentController')->middleware('clinic');
    Route::resource('/clinic-appointment', 'App\Http\Controllers\CappointmentController')->middleware('patient');
    Route::resource('/book', 'App\Http\Controllers\BookController')->middleware('clinic');
});
