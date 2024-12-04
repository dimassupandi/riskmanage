<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiskRequest extends FormRequest
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
            'assets_id' => 'required|integer',
            'description' => 'required|string',
            'frequency' => 'required|integer|min:1|max:5',
            'impact' => 'required|integer|min:1|max:5',
            'level' => 'required|string|in:Low,Medium,High',
            
        ];
    }
}
