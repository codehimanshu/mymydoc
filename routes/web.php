<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/doctor', 'Doctor\DoctorController@index')->name('doctor');
Route::get('/patient', 'Patient\PatientController@index')->name('patient');

Route::post('/apply-for-doctor', 'Patient\PatientController@apply_for_doctor')->name('apply-for-doctor');
Route::post('/doctor-application', 'Patient\PatientController@doctor_application')->name('doctor-application');

Route::get('/book', 'Patient\PatientController@book')->name('book');
Route::post('/book-appointment', 'Patient\PatientController@book_appointment')->name('book-appointment');
Route::post('/accept', 'Doctor\DoctorController@accept')->name('accept');
Route::post('/reject', 'Doctor\DoctorController@reject')->name('reject');
