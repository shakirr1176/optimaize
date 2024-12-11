<?php

namespace App\Http\Requests;

use App\Enums\BooleanStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
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
        ];

        if ($this->isMethod('POST')) {
            $rules["email"] = "required|email|unique:users,email|between:5,255";
        } else {
            $rules["assigned_role"] = "required|exists:roles,slug";
            $rules["is_active"] = [
                "required",
                Rule::in(BooleanStatusEnum::getStatusKeys())
            ];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'email_verified_at' => __('email status'),
            'is_active' => __('account status'),
        ];
    }
}
