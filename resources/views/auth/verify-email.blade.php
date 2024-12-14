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
                    <h1 class="text-center text-lg font-10 font-medium text-black-100">
                        {{ __("Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
                    </h1>
                    <div class="w-10 h-1 bg-primary mx-auto mt-2"></div>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="mb-4 font-medium font-14 text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                @include('auth._flash-message')

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <x-button type="submit" class="hover:bg-opacity-90 duration-300">
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button type="submit" class="mt-5 2xl:mt-6">
                        {{ __('Log Out') }}
                    </x-button>
                </form>
            </div>
        </div>
        <img class="absolute left-0 bottom-0 w-107 xl:block hidden" src="{{ Vite::image('guest/footer.png') }}"
            alt="">
    </div>
</x-guest-layout>
