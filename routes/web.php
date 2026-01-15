<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/cadastrar', [ProdutosController::class,'cadastrar'])->name('produtos.cadastrar');

Route::post('/produtos',[ProdutosController::class,'store']);


