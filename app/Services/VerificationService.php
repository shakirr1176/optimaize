<?php

namespace App\Services;

use App\Models\User;
use App\Mail\Registered;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordResetRequest;

class VerificationService
{
    public function verifyUserEmail(Request $request): bool
    {
        if (!$request->hasValidSignature()) {
            return false;
        }

        $user = User::where('id', $request->user_id)
            ->whereNull('email_verified_at')
            ->first();

        $update = ['email_verified_at' => now()];

        if ($user && $user->update($update)) {
            $notification = [
                'user_id' => $request->user_id,
                'message' => __("Your account has been verified successfully.")
            ];
            Notification::create($notification);

            return true;
        }

        return false;
    }

    public function _sendEmailVerificationLink($user)
    {
        return Mail::to($user->email)->send(new Registered($user));
    }
}
