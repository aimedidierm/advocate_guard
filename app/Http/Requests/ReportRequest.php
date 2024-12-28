<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'type_abuse' => 'required|string|in:Physical abuse,Emotional abuse,Neglect,Sexual abuse',
            'description' => 'required|string',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'date_incident' => 'required|date|before_or_equal:' . now()->toDateString(),
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpg,png,pdf,doc,docx|max:2048',
        ];
    }
}
