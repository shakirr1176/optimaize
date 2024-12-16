<x-guest-layout>
    <div class="flex items-center flex-wrap -mx-4 -mt-5">
        <div class="xl:w-1/2 w-full px-4">
            <img class="object-cover object-center xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                src="{{ Vite::image('guest/other.png') }}" alt="">
        </div>
        <div class="xl:w-1/2 w-full px-4">

            @include('auth._flash-message')

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-5 2xl:gap-6">

                    <div class="flex space-x-2 items-center lara-input">
                        <div class="ml-[-3px]">
                            @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-dark_2')
                        </div>
                        <x-input
                            class="placeholder:text-gray-500 bg-transparent mr-6"
                            id="password"
                            type="password"
                            name="password"
                            :value="old('password')"
                            placeholder="{{ __('Password') }}"
                            required autofocus />
                    </div>
                    @if(settings('display_google_captcha'))
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
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}" alt="">
</x-guest-layout>
