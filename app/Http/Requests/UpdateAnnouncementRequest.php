<?php

namespace App\Http\Requests;

use App\Enums\BooleanStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'type' => [
                'required',
                // Rule::in(array_keys(notices_types())), //need to change
            ],

            'visible_type' => [
                'required',
                // Rule::in(array_keys(notices_visible_types())), //need to change
            ],
            'start_at' => [
                'required',
                'date',
            ],
            'end_at' => [
                'required',
                'date',
            ],
            'is_active' => [
                'required',
                Rule::in(BooleanStatusEnum::getStatusKeys()),
            ],
        ];
    }
}
