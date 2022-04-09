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

Route::middleware(['auth','admin'])->group(function (){

    //Specialty

    Route::get('/specialties',[\App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/specialties/create',[\App\Http\Controllers\Admin\SpecialtyController::class, 'create']); //formulario de registro
    Route::get('/specialties/{specialty}/edit',[\App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
    Route::put('/specialties/{specialty}',[\App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/specialties/{specialty}',[\App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);
    Route::post('/specialties',[\App\Http\Controllers\Admin\SpecialtyController::class, 'store']); //envío del formulario


//Doctors
    Route::resource('doctors','App\Http\Controllers\Admin\DoctorController');


//Patients
    Route::resource('patients','App\Http\Controllers\Admin\PatientController');

});

Route::middleware(['auth','doctor'])->group(function (){

    Route::get('/schedule',[App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::post('/schedule',[App\Http\Controllers\Doctor\ScheduleController::class, 'store']);


});
