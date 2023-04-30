<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticateSessionController;
use App\Http\Controllers\RolesControlller;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome');
Route::view('/home', 'welcome')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');


Route::get('/paciente', [PacienteController::class, 'getPacientes'])->name('paciente');
Route::get('/pacienteForm', [PacienteController::class, 'renderForm'])->name('insertPaciente');
Route::get('/paciente/{paciente}', [PacienteController::class, 'getPacienteById'])->name('paciente.render');
Route::get('/paciente/{paciente}/edit', [PacienteController::class, 'pacienteEdit'])->name('paciente.edit');
Route::get('/paciente/delete/{paciente}', [PacienteController::class, 'pacienteDelete'])->name('paciente.delete');
Route::get('/roles', [RolesControlller::class, 'store'])->name('roles');


Route::post('/paciente', [PacienteController::class, 'addPaciente'])->name('paciente.add');
Route::post('/paciente/{paciente}', [ImagenController::class, 'postImg'])->name('paciente.addImg');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])->name('logout');


Route::get('/paciente/{paciente}/imagen/{img}', [ImagenController::class, 'deleteImgById'])->name('paciente.deleteImgById');
Route::get('/paciente/{paciente}/ver/imagen/{img}', [PacienteController::class, 'showImg'])->name('paciente.showImg');

Route::patch('/paciente/{paciente}', [PacienteController::class, 'pacienteUpdate'])->name('paciente.update');
Route::patch('/roles', [RolesControlller::class, 'update'])->name('roles.update');

