<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:roles,name'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('The role name field is required.'),
            'name.unique' => __('The role name has already been taken.'),
        ];
    }
}
