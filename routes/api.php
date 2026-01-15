<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiProdutosController;

Route::apiResource('apiprodutos',ApiProdutosController::class);
