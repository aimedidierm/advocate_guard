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
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'victim' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'when' => 'required|date',
            'attachments.*' => 'file|mimes:jpg,png,pdf,doc,docx|max:2048',
            'leaning' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ];
    }
}
