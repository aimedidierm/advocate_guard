<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|string',
            'date' => 'required|date',
            'objective' => 'required|string',
            'goals' => 'required|array',
            'goals.*' => 'string',
            'target_audience' => 'required|array',
            'target_audience.*' => 'string',
            'budget_resources' => 'required|array',
            'budget_resources.*' => 'string',
            'timeline' => 'required|array',
            'timeline.*' => 'string',
            'role_responsibilities' => 'required|array',
            'role_responsibilities.*' => 'string',
        ];
    }
}
