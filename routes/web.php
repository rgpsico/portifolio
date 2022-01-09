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
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\PortifolioController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CursosController;
use App\Http\Controllers\Admin\ExperienciaController;
use App\Http\Controllers\Admin\InteressesController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ServicosController;

use App\Http\Controllers\Site\PageController as PController;

Route::get('/', [HomeSite::class, 'index']);
Route::get('/blog/{id}', [HomeSite::class,'singleBlog'])->name('blog');

Route::get('/teste/{origem}/{destino}', [HomeAdmin::class, 'DirectionApi'])->name('admin');


Route::prefix('painel')->group(function () {
    Route::get('/', [HomeAdmin::class, 'index'])->name('admin');

    Route::get('home', [HomeAdmin::class,'home']);
    Route::get('home/create', [HomeAdmin::class,'create'])->name('homecreate');
    Route::get('home/edit/{id}', [HomeAdmin::class,'edit'])->name('homeedit');
    Route::get('home/destroy', [HomeAdmin::class,'edit'])->name('homedestroy');

    Route::get('relatorio/mensal', [ReportsController::class,'months'])->name('reports.months');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [loginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

    Route::resource('pages', PageController::class);

    Route::resource('experiencia', ExperienciaController::class);
    Route::resource('cursos', CursosController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('interesses', InteressesController::class);
    Route::resource('servicos', servicosController::class);
    Route::resource('portifolio', PortifolioController::class);

    Route::resource('categoria', CategoriaController::class);
    
    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::put('profilesave', [ProfileController::class,'save'])->name('profile.save');


    Route::get('settings', [SettingController::class,'index'])->name('settings');
    Route::put('settingssave', [SettingController::class,'save'])->name('settings.save');
});


Route::fallback([PController::class,'index']);
