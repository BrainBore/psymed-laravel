<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::middleware(['auth','SuperAdmin'])->group(function () {
    Route::get('/especialidades', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'create']);
    Route::get('/especialidades/{especialidad}/edit', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'sendData']);
    Route::put('/especialidades/{especialidad}', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'update']);
    Route::delete('/especialidades/{especialidad}', [App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'destroy']);
    //Rutas Medicos
    Route::resource('medicos','App\Http\Controllers\SuperAdmin\DoctorController');
    //Rutas Pacientes
    Route::resource('pacientes','App\Http\Controllers\SuperAdmin\PacienteController');
    //ruta USUARIO
    Route::resource('users','App\Http\Controllers\SuperAdmin\UserController');
    Route::get('/users/pdf',[App\Http\Controllers\SuperAdmin\UserController::class, 'pdf'])->name('user.pdf');
    Route::get('/especialidades/pdf',[App\Http\Controllers\SuperAdmin\EspecialidadController::class, 'pdf'])->name('especialidad.pdf');
    Route::get('/medicos/pdf',[App\Http\Controllers\SuperAdmin\DoctorController::class, 'pdf'])->name('doctor.pdf');
    Route::get('/pacientes/pdf',[App\Http\Controllers\SuperAdmin\PacienteController::class, 'pdf'])->name('paciente.pdf');
});
Route::middleware(['auth','doctor'])->group(function () {
    Route::get('/citas', [App\Http\Controllers\Doctor\CitaController::class, 'edit']);
    Route::post('/citas', [App\Http\Controllers\Doctor\CitaController::class, 'store']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas :especialidades


//Route::get('/', [UserController::class, 'index']);

//Route::get('download-pdf', [UserController::class, 'downloadPdf'])->name('download-pdf');
