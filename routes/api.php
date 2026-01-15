<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProdutosController;

Route::apiResource('produtos',ProdutosController::class);
