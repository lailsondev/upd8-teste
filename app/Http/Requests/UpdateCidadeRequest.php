<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCidadeRequest extends FormRequest
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
        $cidadeId = $this->route('cidade') ?? $this->route('id');

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cidades', 'nome')->ignore($cidadeId),
            ],
            'estado' => 'required|string|max:2',
        ];
    }
}
