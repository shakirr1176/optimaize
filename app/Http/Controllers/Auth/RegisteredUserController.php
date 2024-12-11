<?php

namespace App\Http\Controllers\Auth;

use App\Enums\BooleanStatusEnum;
use App\Enums\ResponseTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\VerificationService;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        if (settings('display_google_captcha')) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $user = null;
        $request->validate($rules);
        DB::beginTransaction();
        try {
            $names = explode(' ', $request->get('name'));

            $user = User::create([
                'first_name' => $names[0],
                'last_name' => $names[1] ?? '',
                'email' => $request->email,
                'assigned_role' => settings("default_role_to_register"),
                'password' => Hash::make($request->password),
            ]);

            if (!$user) {
                throw new Exception("Failed to create user");
            };

            DB::commit();
        } catch (Exception $e) {
            logs()->error($e);
            DB::rollBack();
        }

        if ($user &&  (settings('require_email_verification') == BooleanStatusEnum::ACTIVE->value)) {
            app(VerificationService::class)->_sendEmailVerificationLink($user);
            Auth::login($user);
            return redirect()
                ->route('login')
                ->with(ResponseTypeEnum::SUCCESS->value,  __('Registered successfully.'));
        }

        return redirect()
            ->back()
            ->withInput()
            ->with(ResponseTypeEnum::ERROR->value, __('Failed to change.'));
    }

    public function create(): View
    {
        return view('auth.register');
    }
}
