<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Models\Produtos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class UploadController extends Controller
{
    public function uploadFoto(UploadRequest $request, $id)
    {
        try {
            $produto = Produtos::findOrFail($id);

            if (!$request->hasFile('photo')) {
                return response()->json([
                    'status' => 'erro',
                    'code' => 400,
                    'mensagem' => 'Nenhum arquivo de imagem foi detectado.'
                ], 400);
            }

            if ($produto->photo) {
                Storage::disk('public')->delete($produto->photo);
            }

            $path = $request->file('photo')->store('uploads', 'public');

            $produto->update(['photo' => $path]);

            return response()->json([
                'status' => 'sucesso',
                'code' => 200,
                'dados' => [
                    'id' => $produto->id,
                    'photo' => $path,
                    'url' => asset('storage/' . $path)
                ]
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'erro',
                'code' => 404,
                'mensagem' => "O produto com ID {$id} não existe no sistema."
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'erro',
                'code' => 500,
                'mensagem' => 'Erro interno ao processar o upload no servidor.',
                'debug' => $e->getMessage()
            ], 500);
        }
    }
}
