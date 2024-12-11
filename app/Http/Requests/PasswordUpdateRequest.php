<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PasswordUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                'current_password:web',
            ],
            'new_password' => [
                'required',
                'between:6,32',
                'confirmed'
            ],
            'new_password_confirmation' => [
                'required',
                'between:6,32',
            ]
        ];
    }
}
