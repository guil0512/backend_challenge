<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UploadController;

Route::post('/produtos/{id}/upload-foto', [UploadController::class, 'uploadFoto']);
