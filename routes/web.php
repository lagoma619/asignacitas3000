<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/prueba', function (){
    return view('layouts.form');
}

);*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Specialty

Route::get('/specialties',[\App\Http\Controllers\SpecialtyController::class, 'index']);
Route::get('/specialties/create',[\App\Http\Controllers\SpecialtyController::class, 'create']); //formulario de registro
Route::get('/specialties/{specialty}/edit',[\App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::put('/specialties/{specialty}',[\App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/specialties/{specialty}',[\App\Http\Controllers\SpecialtyController::class, 'destroy']);
Route::post('/specialties',[\App\Http\Controllers\SpecialtyController::class, 'store']); //envío del formulario


//Doctors
Route::resource('doctors','App\Http\Controllers\DoctorController');


//Patients
