<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => 'required|string|max:14|unique:clientes,cpf',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'endereco' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ];
    }
}
