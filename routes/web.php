<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\LoginController as adminLoginController;
use App\Http\Controllers\admin\DashboardController as adminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('account')->group(function () {

    Route::middleware('guest')->group(function () {
         Route::get('/register',[LoginController::class,'viewRegister'])->name('register');
         Route::get('/login',[LoginController::class,'viewLogin'])->name('login');


        Route::post('/process-register',[LoginController::class,'register'])->name('account.register');
        Route::post('/authentication',[LoginController::class,'login'])->name('account.login');
    });

    Route::middleware('auth')->group(function () {
         Route::get('/dashboard',[LoginController::class,'dashboard'])->name('account.dashboard');
         Route::get('/logout',[LoginController::class,'logout'])->name('account.logout');
    });
});


Route::prefix('admin')->group(function(){

    Route::middleware('admin.guest')->group(function(){
        Route::get('/login',[adminLoginController::class,'viewAdminLogin'])->name('admin.login');
        Route::post('/authenticate',[adminLoginController::class,'adminLogin'])-> name('admin.login.submit');
    });


    Route::middleware('admin.auth')->group(function(){
       Route::get('/dashboard',[adminDashboardController::class,'adminDashboard'])->name('admin.dashboard');
       Route::get('/logout',[adminDashboardController::class,'adminLogout'])->name('admin.logout');
    });
});








