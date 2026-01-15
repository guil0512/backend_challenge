<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        return Produtos::all();
    }

    public function store(Request $request)
    {
        Produtos::create($request->all());
    }

    public function show(string $id)
    {
        return Produtos::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $produtos = Produtos::findOrFail($id);
        $produtos->update($request->all());
    }

    public function destroy($id)
    {
        $produtos = Produtos::findOrFail($id);
        $produtos->delete();
    }
}
