<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
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
        $clienteId = $this->route('cliente');

        return [
            'cpf' => [
                'sometimes',
                'required',
                'string',
                'max:14',
                Rule::unique('clientes', 'cpf')->ignore($clienteId),
            ],
            'nome' => 'sometimes|required|string|max:255',
            'data_nascimento' => 'sometimes|required|date',
            'sexo' => 'sometimes|required|in:M,F',
            'endereco' => 'sometimes|required|string|max:255',
            'cidade_id' => 'sometimes|required|exists:cidades,id',
        ];
    }
}
