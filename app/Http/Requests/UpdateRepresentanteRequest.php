<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRepresentanteRequest extends FormRequest
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
        $representanteId = $this->route('representante') ?? $this->route('id');

        return [
            'nome' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('representantes', 'email')->ignore($representanteId),
            ],
            'telefone' => 'nullable|string|max:20',
            'cidade_id' => 'sometimes|required|exists:cidades,id'
        ];
    }
}
