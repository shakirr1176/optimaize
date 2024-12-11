<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\ResponseTypeEnum;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PasswordStoreRequest;

class PasswordCreateController extends Controller
{
    public function create(Request $request, User $user): View
    {
        if (!$request->hasValidSignature()) {
            return redirect()->route('home');
        }

        $passwordCreateLink = URL::signedRoute('account.password.store', ['user' => $user->id]);
        $data = [
            'id' => $user->id,
            'passwordCreateLink' => $passwordCreateLink
        ];

        return view('auth.create_password', $data);
    }

    public function store(PasswordStoreRequest $request, User $user): RedirectResponse
    {
        if (!$request->hasValidSignature()) {
            return redirect()->back()
                ->with(ResponseTypeEnum::ERROR->value, __('Invalid Request.'));
        }

        $parameters = [
            'password' => Hash::make($request->get('password')),
            'email_verified_at' => now(),
        ];
        if ($user && $user->update($parameters)) {
            return redirect()
                ->route('login')
                ->with(ResponseTypeEnum::SUCCESS->value,  __('Password set successfully.'));
        }

        return redirect()->back()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to change.'));
    }
}
