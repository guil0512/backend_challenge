<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::post('/produtos/{id}/photo', [PhotoController::class, 'uploadPhoto'])
     ->name('produtos.photo');

Route::get('/produtos/{id}', [PhotoController::class, 'showUploadForm'])
    ->name('produtos.photo.form');
