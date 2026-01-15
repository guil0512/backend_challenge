<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;

class ProdutosController extends Controller
{
        public function index()
    {
        $produtos = Produtos::all();

        return view('listar', compact('produtos'));

        // return response()->json($produtos);
    }

    public function cadastrar() {
        return view('cadastrar');
    }

    // mesma coisa do create

    public function edit($id) {
        $produto = Produtos::findOrFail($id);
        return view('editar', compact('produto'));
    }

    public function update(ProdutosRequest $request, string $id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->update($request->validated());

        return redirect()->route('produtos.index');
    }

    public function store(ProdutosRequest $request)
    {
        Produtos::create($request->validated());

        return redirect()->route('produtos.index')->with('success','Produto cadastrado com sucesso.');
    }

}
