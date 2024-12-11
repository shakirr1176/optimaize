<?php

namespace App\Http\Requests;

use App\Enums\AnnouncementStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnouncementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'is_published' => [
                'required',
                Rule::in(AnnouncementStatusEnum::getStatusKeys()),
            ],
        ];
    }
}
