<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\ResponseTypeEnum;
use Illuminate\Support\Facades\Auth;
use App\Services\VerificationService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PasswordResetRequest;

class VerificationController extends Controller
{
    public function verify(Request $request): RedirectResponse
    {
        $route = Auth::check() ? 'profile.index' : 'login';
        $response = app(VerificationService::class)->verifyUserEmail($request);
        $status = ResponseTypeEnum::SUCCESS->value;
        $message = __('Invalid verification link or already verified or expired verification link.');
        if ($response) {
            $status = ResponseTypeEnum::SUCCESS->value;
            $message = __('Your account has been verified successfully.');
        }

        return redirect()->route($route)->with($status, $$message);
    }

    public function send(PasswordResetRequest $request): RedirectResponse
    {
        if (Auth::check()) {
            if (!Auth::user()?->email_verified_at) {
                $user = Auth::user();
            } else {
                $user = false;
            }
        } else {
            $user = User::where(['email' => $request->email, 'email_verified_at' => null])->first();
        }

        if (!$user) {
            return redirect()
                ->back()
                ->with(ResponseTypeEnum::ERROR->value, __('The given email address is already verified.'));
        }

        return redirect()
        ->back()
        ->with(ResponseTypeEnum::SUCCESS->value, __('Email verification link is sent successfully.'));
    }
}
