<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beranda;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\adminMitraController;
use App\Http\Controllers\adminKontraktorController;
use App\Http\Controllers\adminPerbaikanController;
use App\Http\Controllers\adminPembangunanController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPerbaikanController;
use App\Http\Controllers\UserPembangunanController;

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
// Auth::routes();
Route::get('/login', [LoginController::class,'show'])->name('show');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::middleware(['middleware' => 'auth','role:user'],)->group(function () 
{
    Route::resource('/userDashboard', UserController::class);
    Route::resource('/userPerbaikan', UserPerbaikanController::class);
    Route::resource('/userPembangunan', UserPembangunanController::class);
    
});

Route::middleware(['middleware' => 'auth','role:admin'],)->group(function () 
{

    //Routing admin Dashboard
    Route::resource('/adminDashboard',adminDashboardController::class);

    //Routing admin Mitra
    Route::resource('/adminMitra',adminMitraController::class);

    //Routing admin Kontraktor
    Route::resource('/adminKontraktor',adminKontraktorController::class);

    //Routing admin Perbaikan
    Route::resource('/adminPerbaikan',adminPerbaikanController::class);

    //Routing admin Pembangunan
    Route::resource('/adminPembangunan',adminPembangunanController::class);

});
Route::get('/home', [HomeController::class, 'index'])->name('home');
