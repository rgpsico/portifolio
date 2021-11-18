<?php

use App\Http\Controllers\Api\ArticleControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UploadController;


Route::get('/teste/{cep}',[UploadController::class,'teste']);

Route::post('/imageupload', [UploadController::class, 'imageUpload'])->name('imageupload');

Route::resource('/article',ArticleControllerApi::class);