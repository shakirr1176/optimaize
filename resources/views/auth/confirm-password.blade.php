<x-guest-layout>
    <div class="2xl:max-w-5xl xl:max-w-4xl sm:max-w-3xl bg-white rounded-lg md:px-32 md:py-10 xl:py-32 px-6 py-6 relative">
        <div class="flex items-center flex-wrap -mx-4 -mt-5">
            <div class="xl:w-1/2 w-full px-4">
                <img class="object-cover object-center xl:max-w-sm max-w-xs 2xl:h-96 h-60 mx-auto xl:mx-0"
                    src="{{ Vite::image('guest/other.png') }}" alt="">
            </div>
            <div class="xl:w-1/2 w-full px-4">

                @include('auth._flash-message')

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <div class="sm:w-1/2 w-full xl:w-full px-2">
                            <div class="flex space-x-2 items-center px-7 lara-input mb-6">
                                <div class="ml-[-3px]">
                                    @svg('heroicon-o-lock-closed', 'w-[23.5px] h-5 mr-2 text-black-30')
                                </div>
                                <x-input
                                    id="password"
                                    type="password"
                                    name="password"
                                    :value="old('password')"
                                    placeholder="{{ __('Password') }}"
                                    required autofocus />
                            </div>
                        </div>
                        @if(settings('display_google_captcha'))
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
                    <x-button type="submit" class="text-white bg-lara-blue hover:bg-opacity-90 duration-300 w-full lara-btn font-medium">
                        {{ __('Confirm') }}
                    </x-button>
                </form>
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}" alt="">
    </div>
</x-guest-layout>
