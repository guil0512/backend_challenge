<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UploadRequest extends FormRequest
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
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'photo.required' => 'Você precisa selecionar uma imagem!',
            'photo.image' => 'O arquivo deve ser uma imagem válida.',
            'photo.mimes' => 'O arquivo deve ter uma extensão válida.',
            'photo.max' => 'A imagem não pode ter mais de 2MB.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'erro',
            'code' => 422,
            'mensagem' => 'Falha na validação dos dados.',
            'errors' => $validator->errors()
        ], 422));
    }

}
