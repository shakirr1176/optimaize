<x-guest-layout>
    <div
        class="2xl:max-w-5xl xl:max-w-4xl sm:max-w-3xl bg-optm-gray-300 dark:bg-lara-whiteGray rounded-lg md:px-32 md:py-10 xl:py-32 px-6 py-6 relative">
        <div class="flex items-center flex-wrap -mx-4 -mt-5">
            <div class="xl:w-1/2 w-full px-4">
                <img class="object-cover object-center xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                    src="{{ Vite::image('guest/others.png') }}" alt="">
            </div>
            <div class="xl:w-1/2 w-full px-4">
                <div class="mb-7">
                    <h1 class="text-center text-2xl font-24 font-medium text-black-100">
                        {{ __('Generate Password') }}
                    </h1>
                    <div class="w-10 h-1 bg-optm-purple font-semibold mx-auto mt-2"></div>
                </div>

                @include('auth._flash-message')

                <form method="POST" action="{{ $passwordCreateLink }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-5 2xl:gap-6">
                        <div>
                            <div class="flex items-center lara-input">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-dark_2')
                                </div>
                                <x-input class="placeholder:text-gray-500 bg-transparent mr-6" id="password"
                                    type="password" name="password" :value="old('password')" placeholder="{{ __('Password') }}"
                                    autofocus />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password') }}</x-auth-error>
                        </div>
                        <div>
                            <div class="flex items-center lara-input">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-dark_2')
                                </div>
                                <x-input class="placeholder:text-gray-500 bg-transparent mr-6"
                                    id="password_confirmation" type="password" name="password_confirmation"
                                    :value="old('password_confirmation')" placeholder="{{ __('Confirm Password') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password_confirmation') }}
                            </x-auth-error>
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
                        <x-button type="submit">
                            {{ __('Change') }}
                        </x-button>
                    </div>
                </form>
                @if (settings('registration_active_status'))
                    <p class="mt-4 2xl:mt-6 text-center">
                        {{ __('Register An Account?') }}
                        <a class="text-optm-purple font-semibold" href="{{ route('register') }}">
                            {{ __('Click Here') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}"
            alt="">
    </div>
</x-guest-layout>
