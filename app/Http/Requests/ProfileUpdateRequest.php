<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "first_name" => [
                "required",
                "string",
                "between:2,255"
            ],
            "last_name" => [
                "required",
                "string",
                "between:2,255"
            ],
            "address" => [
                "string",
                "max:500"
            ],
            "phone" => [
                "string",
                "max:20"
            ],
        ];
    }
}
