<x-guest-layout>
    <div
        class="2xl:max-w-5xl xl:max-w-4xl sm:max-w-3xl bg-white rounded-lg md:px-32 md:py-10 xl:py-32 px-6 py-6 relative">
        <div class="flex items-center flex-wrap -mx-4 -mt-5">
            <div class="xl:w-1/2 w-full px-4">
                <img class="object-cover object-center xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                    src="{{ Vite::image('guest/others.png') }}" alt="">
            </div>
            <div class="xl:w-1/2 w-full px-4">
                <div class="mb-7">
                    <h1 class="text-center text-2xl font-24 font-medium text-black-100">
                        {{ __('Reset Password') }}</h1>
                    <div class="w-10 h-1 bg-primary mx-auto mt-2"></div>
                </div>

                @include('auth._flash-message')

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="flex flex-wrap -mx-2">
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex items-center px-7 lara-input">
                                @svg('heroicon-o-envelope', 'w-5 h-5 mr-2.5 text-black-30')
                                <x-input id="email" type="email" name="email" :value="old('email')"
                                    placeholder="{{ __('Enter Your Email') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('email') }}</x-auth-error>
                        </div>
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex items-center px-7 lara-input mt-6 sm:mt-0 xl:mt-6">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input id="password" type="password" name="password" :value="old('password')"
                                    placeholder="{{ __('Password') }}" autofocus />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password') }}</x-auth-error>
                        </div>
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex items-center px-7 lara-input mt-6">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input id="password_confirmation" type="password" name="password_confirmation"
                                    :value="old('password_confirmation')" placeholder="{{ __('Confirm Password') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password_confirmation') }}
                            </x-auth-error>
                        </div>
                        @if (settings('display_google_captcha'))
                            <div class="md:w-1/2 w-full xl:w-full px-2 mt-6 mb-4">
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-sm text-red-600 mt-1.5 block">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <x-button type="submit" class="hover:bg-opacity-90 duration-300">
                        {{ __('Change') }}
                    </x-button>
                </form>
                @if (settings('registration_active_status'))
                    <div>
                        <p class=" text-black-50 font-14 text-center">{{ __('Register An Account?') }}
                            <a class=" text-primary" href="{{ route('register') }}">{{ __('Click Here') }}</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}"
            alt="">
    </div>
</x-guest-layout>
