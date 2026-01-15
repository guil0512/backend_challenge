<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Produtos;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function uploadPhoto(PhotoRequest $request, $id)
    {
        $produto = Produtos::findOrFail($id);

        // Se o produto já tem foto, deleta a antiga
        if ($produto->photo) {
            Storage::disk('public')->delete($produto->photo);
        }

        // Salva a nova foto (o PhotoRequest já garantiu que o arquivo está lá e é válido)
        $path = $request->file('photo')->store('produtos', 'public');

        $produto->update(['photo' => $path]);

        return response()->json([
            'message' => 'Foto atualizada!',
            'url' => asset('storage/' . $path)
        ]);
    }

    public function showUploadForm($id)
    {
        $produto = Produtos::findOrFail($id);
        $todosProdutos = Produtos::select('id','name')->get();

        return view('photo', compact('produto'));
    }

}
