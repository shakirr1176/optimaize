<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @return View
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'email' => $request->user()->email,
            'password' => $request->password,
        ];
        if (settings('display_google_captcha')) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        if (!Auth::guard('web')->validate($rules)) {
            throw ValidationException::withMessages([
                'password' => trans("auth.password"),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended();
    }
}
