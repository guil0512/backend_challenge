<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function principal() {
        return view('principal');
    }

    public function cadastrar() {
        return view('cadastrar');
    }

    public function store(Request $request) {
        Produtos::create($request->all());
        return redirect()->route('index')->with('success', 'Cliente cadastrado com sucesso!');
    }

}
