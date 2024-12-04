<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MitigationRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'risks_id' => 'required|integer|exists:risks,id',
            'action' => 'required|string|max:255',
        ];
    }
}
