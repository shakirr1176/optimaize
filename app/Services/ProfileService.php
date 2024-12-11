<?php

namespace App\Services;

use App\Http\Requests\{PasswordUpdateRequest, UserAvatarRequest};
use App\Mail\EmailVerification;
use App\Models\Notification;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Support\Facades\Mail;

class ProfileService
{
    public function profile(): array
    {
        return ['user' => Auth::user()?->load('role')];
    }

    public function updatePassword(PasswordUpdateRequest $request): bool
    {
        $update = ['password' => Hash::make($request->new_password)];

        if (Auth::user()?->update($update)) {
            $notification = ['user_id' => Auth::id(), 'message' => __("You just changed your account's password.")];
            Notification::create($notification);

            return true;
        }

        return false;
    }

    public function avatarUpload(UserAvatarRequest $request): bool
    {
        $uploadedAvatar = app(FileUploadService::class)->upload($request->file('avatar'), config('commonconfig.path_profile_image'), 'avatar', 'user', Auth::id(), 'public', 300, 300, false);

        if ($uploadedAvatar) {
            $parameters = ['avatar' => $uploadedAvatar];

            if (Auth::user()?->update($parameters)) {
                return true;
            }
        }

        return false;
    }

    public function verificationMailRequest(): void
    {
        $user = Auth::user();
        Mail::to($user->email)->send(new EmailVerification($user));
    }
}
