<?php

use App\Http\Controllers\FrontController;
use App\Http\Livewire\Homecomponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MssgeController;
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

Route::get('/',[SiteController::class,'products']);
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//doctors
Route::get('/doctor/create',[\App\Http\Controllers\DoctorController::class,'create'])->name('doctor.create');
Route::get('/doctor/edit/{id}',[\App\Http\Controllers\DoctorController::class,'edit'])->name('doctor.edit');
Route::post('/doctor/store',[\App\Http\Controllers\DoctorController::class,'store'])->name('doctor.store');
Route::post('/doctor/update',[\App\Http\Controllers\DoctorController::class,'update'])->name('doctor.update');
Route::get('/doctor/delete\{id}',[\App\Http\Controllers\DoctorController::class,'destroy'])->name('doctor.delete');
Route::get('/doctor/index',[\App\Http\Controllers\DoctorController::class,'index'])->name('doctor.index');
//specialies
Route::get('/Specialy/create',[\App\Http\Controllers\SpecialyController::class,'create'])->name('specialy.create');
Route::get('/Specialy/edit/{id}',[\App\Http\Controllers\SpecialyController::class,'edit'])->name('specialy.edit');
Route::post('/Specialy/store',[\App\Http\Controllers\SpecialyController::class,'store'])->name('specialy.store');
Route::post('/Specialy/update',[\App\Http\Controllers\SpecialyController::class,'update'])->name('specialy.update');
Route::get('/Specialy/delete\{id}',[\App\Http\Controllers\SpecialyController::class,'destroy'])->name('specialy.delete');
Route::get('/Specialy/index',[\App\Http\Controllers\SpecialyController::class,'index'])->name('specialy.index');




Route::get('/home',[\App\Http\Controllers\HomeController::class,'redirect']);
Route::get('/doctors',[FrontController::class,'doctors']);
Route::get('/about',[FrontController::class,'about']);
Route::get('/contact',[FrontController::class,'contact']);
Route::get('/news',[FrontController::class,'news']);
Route::get('/appoinment/store',[\App\Http\Controllers\AppoinmentController::class,'store']);
Route::get('/message/store',[\App\Http\Controllers\MessageController::class,'store']);




Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);


Route::get('/mssges',[MssgeController::class,'mssges']);