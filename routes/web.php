<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

Route::get('/a', function () {
    return view('index');
})->name('index');

Route::resource('produtos', ProdutosController::class);

Route::get('/', [ProdutosController::class,'index'])->name('produtos.index');

Route::get('/cadastrar', [ProdutosController::class,'cadastrar'])->name('produtos.cadastrar');



