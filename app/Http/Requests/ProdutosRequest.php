<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.max' => 'O nome do produto é muito grande.',
            'description.required' => 'A descrição do produto é obrigatória.',
            'description.max' => 'A descrição do produto é muito grande.',
            'price.required' => 'O preço do produto é obrigatório.',
            'price.numeric' => 'Insira corretamente o valor do produto.',
            'price.min' => 'O preço do produto é obrigatório',
        ];
    }

    public function prepareForValidation() {
        if ($this->has('price')) {
            $this->merge([
                'price' => str_replace(',','.',$this->price),
            ]);
        }
    }
}
