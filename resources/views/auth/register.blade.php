<x-guest-layout>
    <div
        class="2xl:max-w-5xl xl:max-w-4xl sm:max-w-3xl bg-lara-whiteGray rounded-lg md:px-32 md:py-10 xl:py-20 px-6 py-6 relative">
        <div class="flex items-center flex-wrap -mx-4 -mt-3">
            <div class="xl:w-1/2 w-full px-4">
                <img class="object-cover object-center xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                    src="{{ Vite::image('guest/register.png') }}" alt="">
            </div>
            <div class="xl:w-1/2 w-full px-4">
                <div class="mb-7 mt-7 xl:mt-0">
                    <h1 class="text-center text-2xl font-medium text-white font-24">
                        {{ __('Register Account') }}</h1>
                    <div class="w-20 h-1 bg-primary mx-auto mt-2"></div>
                </div>

                @include('auth._flash-message')

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex items-center px-7 lara-input border-lara-gray-100 bg-lara-primary">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-user', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input class="bg-lara-primary" id="name" type="text" name="name" :value="old('name')"
                                    placeholder="{{ __('Enter Your Name') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('name') }}</x-auth-error>
                        </div>
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex items-center px-7 lara-input border-lara-gray-100 bg-lara-primary mt-6">
                                @svg('heroicon-o-envelope', 'w-5 h-5 mr-2.5 text-black-30')
                                <x-input class="bg-lara-primary" id="email" type="email" name="email" :value="old('email')"
                                    placeholder="{{ __('Enter Your Email') }}" />
                            </div>
                            <x-auth-error name="error">{{ $errors->first('email') }}</x-auth-error>
                        </div>
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="group passwordFields flex items-center px-7 lara-input mt-6 md:mt-0 xl:mt-6 border-lara-gray-100 bg-lara-primary relative">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input class="bg-lara-primary" id="password" type="password" name="password" :value="old('password')"
                                    placeholder="{{ __('Password') }}" autofocus />
                                    <button type="button" class="eye w-[17px] h-[17px] absolute top-1/2 -translate-y-1/2 right-3.5">
                                        @svg('heroicon-o-eye', 'h-[17px] h-[17px] text-black-30 pointer-events-none block group-[.active]:hidden')
                                        @svg('heroicon-o-eye-slash', 'h-[17px] h-[17px] text-black-30 pointer-events-none hidden group-[.active]:block')
                                    </button>
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password') }}</x-auth-error>
                        </div>
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="group passwordFields flex items-center px-7 lara-input mt-6 md:mt-0 xl:mt-6 border-lara-gray-100 bg-lara-primary relative">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input class="bg-lara-primary" id="password_confirmation" type="password" name="password_confirmation"
                                    :value="old('password_confirmation')" placeholder="{{ __('Confirm Password') }}" />
                                    <button type="button" class="eye w-[17px] h-[17px] absolute top-1/2 -translate-y-1/2 right-3.5">
                                        @svg('heroicon-o-eye', 'h-[17px] h-[17px] text-black-30 pointer-events-none block group-[.active]:hidden')
                                        @svg('heroicon-o-eye-slash', 'h-[17px] h-[17px] text-black-30 pointer-events-none hidden group-[.active]:block')
                                    </button>
                            </div>
                            <x-auth-error name="error">{{ $errors->first('password_confirmation') }}
                            </x-auth-error>
                        </div>
                        @if (settings('display_google_captcha'))
                            <div class="sm:w-1/2 w-full xl:w-full px-2 mt-6 mb-4">
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-sm text-red-600 mt-1.5 block">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <x-button type="submit" class="hover:bg-opacity-90">
                        {{ __('Register') }}
                    </x-button>
                </form>
                <div>
                    <p class="text-black-50 font-14 text-center">
                        {{ __('Already Have An Account?') }}
                        <a class="text-primary" href="{{ route('login') }}">{{ __('Click Here') }}</a>
                    </p>
                </div>
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}"
            alt="">
    </div>
</x-guest-layout>
