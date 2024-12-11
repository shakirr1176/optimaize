<?php

namespace App\Http\Requests;

use App\Enums\BooleanStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'name' => [
                'required',
                Rule::unique('languages')->ignore($this->route()?->parameter('language')),
            ],
            'short_code' => [
                'required',
                'min:2',
                'max:2',
                Rule::unique('languages')->ignore($this->route()?->parameter('language'))
            ],
            'icon' => [
                'required',
                'image',
                'max:100',
            ],
        ];

        if ($this->isMethod('PUT')) {
            $rules['is_active'] = [
                'required',
                Rule::in(BooleanStatusEnum::getStatusKeys()),
            ];
            $rules['is_rtl'] = [
                'required',
                Rule::in(array_keys(get_language_direction()))
            ];

            //Remove required validation from icon
            array_shift($rules['icon']);
        }

        return $rules;
    }
}
