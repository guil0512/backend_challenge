<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;

class ApiProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

        return view('listar', compact('produtos'));

        // return response()->json($produtos);
    }

    public function store(ProdutosRequest $request)
    {
        Produtos::create($request->validated());

        return redirect()->route('produtos.index')->with('success','Produto cadastrado com sucesso.');
    }

    public function show(string $id)
    {
        return Produtos::findOrFail($id);
    }

    public function update(ProdutosRequest $request, string $id)
    {
        $produtos = Produtos::findOrFail($id);
        $produtos->update($request->all());
    }

    public function destroy($id)
    {
        $produtos = Produtos::findOrFail($id);
        $produtos->delete();

        return redirect()->route('produtos.index')->with('success','Produto cadastrado com sucesso.');;
    }
}
