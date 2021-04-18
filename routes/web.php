<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as HomeSite;
use App\Http\Controllers\Admin\HomeController as HomeAdmin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Site\PageController as PController;
Route::get('/', [HomeSite::class, 'index']);

Route::prefix('painel')->group(function () {
    Route::get('/',    [HomeAdmin::class, 'index'])->name('admin');


    Route::get('login',  [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [loginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

    Route::resource('pages', PageController::class);

    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::put('profilesave', [ProfileController::class,'save'])->name('profile.save');


    Route::get('settings', [SettingController::class,'index'])->name('settings');
    Route::put('settingssave', [SettingController::class,'save'])->name('settings.save');
});


Route::fallback([PController::class,'index']);