<?php

namespace App\Http\Requests;

use App\Enums\BooleanStatusEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(!Auth::user()){
            $validation = [
                'email' => 'required|email|exists:users,email|between:5,255'
            ];

            if( env('APP_ENV') != 'local' && settings('display_google_captcha') == BooleanStatusEnum::ACTIVE->value )
            {
                $validation['g-recaptcha-response'] = 'required|captcha';
            }

            return $validation;
        }
        return [];
    }

    public function messages()
    {
        return [
            'email.exists' => __('The given email is not registered.')
        ];
    }

    public function attributes()
    {
        return ['g-recaptcha-response' => 'google captcha'];
    }
}
