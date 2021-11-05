<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UploadController;


Route::get('teste',[UploadController::class,'teste']);

Route::post('/imageupload', [UploadController::class, 'imageUpload'])->name('imageupload');