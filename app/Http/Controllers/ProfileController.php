<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Enums\ResponseTypeEnum;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\{PasswordUpdateRequest, ProfileUpdateRequest, UserAvatarRequest};

class ProfileController extends Controller
{
    private ProfileService $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $data = $this->service->profile();
        $data['title'] = __('Profile');

        return view('profile.index', $data);
    }

    public function edit(): View
    {
        $data = $this->service->profile();
        $data['title'] = __('Profile Update');

        return view('profile.edit', $data);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $parameters = $request->only(['first_name', 'last_name']);
        if (optional(Auth::user())->update($parameters)) {
            return redirect()
                ->route('profile.index')
                ->with(ResponseTypeEnum::SUCCESS->value, __('Profile has been updated successfully.'));
        }

        return redirect()->back()->with(ResponseTypeEnum::ERROR->value, __('Failed to update profile.'));
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $response = $this->service->updatePassword($request);
        $status = ResponseTypeEnum::ERROR->value;
        $message = __('Failed to change password.');
        if ($response) {
            $status = ResponseTypeEnum::SUCCESS->value;
            $message = __('Password has been changed successfully. Please login again.');
        }

        Auth::logout();
        return redirect()->route('login')->with($status, $message);
    }

    public function avatarUpdate(UserAvatarRequest $request): RedirectResponse
    {
        $response = $this->service->avatarUpload($request);
        $status = ResponseTypeEnum::ERROR->value;
        $message = __('Failed to upload the avatar.');
        if ($response) {
            $status = ResponseTypeEnum::SUCCESS->value;
            $message = __('Avatar has been uploaded successfully.');
        }

        return redirect()->back()->with($status, $message);
    }

    public function verificationMailRequest(): RedirectResponse
    {
        $this->service->verificationMailRequest();
        return redirect()->back()
            ->with(ResponseTypeEnum::SUCCESS->value, __('Verification email has been successfully.'));
    }
}
