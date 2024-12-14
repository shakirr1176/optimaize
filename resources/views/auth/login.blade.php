<x-guest-layout>
    <div
        class="2xl:max-w-5xl xl:max-w-4xl sm:max-w-3xl bg-optm-gray-300 dark:bg-lara-whiteGray md:px-20 xl:px-32 md:py-20 xl:py-20 2xl:py-32 px-6 py-6 relative rounded-lg">
        <div class="row items-center -mt-5">
            <div class="xl:w-1/2 w-full px-4">
                <img class="object-cover object-center 2xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                    src="{{ Vite::image('guest/login.png') }}" alt="">
            </div>
            <div class="xl:w-1/2 w-full px-4">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-7">
                    <h1 class="text-center font-24 font-medium text-dark_2">{{ __('Sign In') }}</h1>
                    <div class="w-10 h-1 bg-optm-purple mx-auto mt-2"></div>
                </div>

                @include('auth._flash-message')

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-5 2xl:gap-6">
                        <div>
                            <div class="flex items-center lara-input mr-2">
                                @svg('heroicon-o-envelope', 'w-5 h-5 mr-2.5 text-dark_2')
                                <x-input class="placeholder:text-gray-500 bg-transparent" id="email" type="text" name="email" :value="old('email')"
                                    placeholder="{{ __('Enter Your Email') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('email') }}</x-auth-error>
                        </div>
                        <div>
                            <div class="group passwordFields flex items-center lara-input relative">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-dark_2')
                                </div>
                                <x-input class="placeholder:text-gray-500 bg-transparent mr-6" id="password" type="password" name="password" :value="old('password')"
                                    placeholder="{{ __('Enter Your Password') }}" />
                                    <button type="button" class="eye w-[17px] h-[17px] absolute top-1/2 -translate-y-1/2 right-3.5">
                                        @svg('heroicon-o-eye', 'h-[17px] h-[17px] text-dark_2 pointer-events-none block group-[.active]:hidden')
                                        @svg('heroicon-o-eye-slash', 'h-[17px] h-[17px] text-dark_2 pointer-events-none hidden group-[.active]:block')
                                    </button>
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password') }}</x-auth-error>
                        </div>
                        @if (settings('display_google_captcha'))
                            <div>
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-sm text-red-600 mt-1.5 block">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif
                            </div>
                        @endif
                        <div>
                            @if (Route::has('password.request'))
                                <p class="text-dark_2 font-14">{{ __('Forgot Password?') }}
                                    <a class="text-optm-purple font-semibold" href="{{ route('password.request') }}">
                                        {{ __('Click Here') }}
                                    </a>
                                </p>
                            @endif
                        </div>

                        <x-button type="submit" class="hover:bg-opacity-90">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
                @if (settings('registration_active_status'))
                    <div class="mt-4 2xl:mt-6 text-center">
                        <p class=" text-dark_2 font-14">
                            {{ __('Register An Account?') }}
                            <a class=" text-optm-purple font-semibold" href="{{ route('register') }}">{{ __('Click Here') }}</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}"
            alt="">
    </div>
</x-guest-layout>
