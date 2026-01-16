<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use App\Http\Requests\UploadRequest;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ApiProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

            return request()->expectsJson()
            ? response()->json($produtos, 200)
            : view('listar', compact('produtos'));

    }

public function store(ProdutosRequest $request)
    {
        try {
            $dados = $request->validated();

            if ($request->hasFile('photo')) {
                $dados['photo'] = $request->file('photo')->store('uploads', 'public');
            }

            $produto = Produtos::create($dados);

            return $request->expectsJson()
              ? response()->json([
                    'status' => 'sucesso',
                    'mensagem' => 'Produto cadastrado com sucesso.',
                    'dados' => $produto
                ], 201)
              : redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso.');

        } catch (Exception $e) {
            return response()->json(['erro' => 'Falha ao salvar', 'debug' => $e->getMessage()], 500);
        }
    }

public function show(string $id)
    {
        try {
            $produto = Produtos::findOrFail($id);

            return  request()->expectsJson()
            ? response()->json($produto, 200)
            : view('produtos.index', compact('produto'));

        } catch (ModelNotFoundException $e) {
            return response()->json(['erro' => 'Produto não encontrado'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $produto = Produtos::findOrFail($id);

            $dados = $request->all();
            if ($request->hasFile('photo')) {
                $dados['photo'] = $request->file('photo')->store('uploads', 'public');
            }

            $produto->update($dados);

            return $request->expectsJson()
                ? response()->json(['mensagem' => 'Atualizado com sucesso', 'dados' => $produto], 200)
                : redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');

        } catch (ModelNotFoundException $e) {
            return response()->json(['erro' => 'Produto não encontrado para atualizar'], 404);
        } catch (Exception $e) {
            return response()->json(['erro' => 'Erro interno', 'debug' => $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request,$id)
    {
        try {

            $produto = Produtos::findOrFail($id);
            $produto->delete();

            return $request->expectsJson()
                ? response()->json(['mensagem' => 'Produto removido com sucesso'], 200)
                : redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso.');

        } catch (ModelNotFoundException $e) {
            return response()->json(['erro' => 'Produto não encontrado para remover'], 404);
        } catch (Exception $e) {
            return response()->json(['erro' => 'Erro ao remover', 'debug' => $e->getMessage()], 500);
        }
    }
}
