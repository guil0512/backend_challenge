<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                'photo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'photo.required' => 'Você precisa selecionar uma imagem.',
            'photo.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'photo.mimes' => 'A imagem deve estar nos formatos: JPG, JPEG, PNG ou WEBP.',
            'photo.max' => 'A imagem não pode ser maior que 2MB.',
        ];
    }

}
