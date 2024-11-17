<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' => 'required|string|in:Community,Child',
            'id_number' => 'required|string',
            'gender' => 'required|string|in:Male,Female',
            'phone_number' => 'required|numeric',
            'country' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string',
        ];
    }
}
