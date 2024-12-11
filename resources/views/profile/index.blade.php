@php

use App\Enums\BooleanStatusEnum;
@endphp
<x-app-layout>
    <x-section name="title">{{ __('Profile') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Profile') }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10">
        <div class="row">
            @include('profile.avatar')
            <div class="w-full px-4 xl:w-2/3 pb-0">
                <div class="w-full h-full rounded-lg dark:bg-lara-darkBlack bg-white p-6 2xl:p-10">
                    <div class="flex justify-between items-center border-b dark:border-b-lara-whiteGray pb-2 mb-4">
                        <div>
                            <h2 class="font-medium dark:text-white text-lara-whiteGray font-18">{{ __('User Information') }}</h2>
                        </div>
                        <div>
                            <a class="dark:bg-black-30 bg-gray-100 dark:bg-opacity-20 border border-gray-400 dark:border-none hover:bg-lara-gray-200 hover:text-white group relative flex items-center space-x-2 rounded-md w-[30px] h-[30px] justify-center capitalize dark:text-white text-lara-gray-400 ml-1"
                                href="{{ route('profile.edit') }}">@svg('heroicon-s-pencil', 'w-4 pointer-events-none')
                                <span
                                    class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                    <span
                                        class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Edit') }}</span>
                                    <span
                                        class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full space-y-7 py-6">
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Name') }}
                                <span class="text-right pl-3 pr-16">:</span>
                            </div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ auth()->user()->fullName }}</div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('User') }}
                                {{ __('Role') }} <span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ ucwords(auth()->user()->assigned_role) }}</div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Email') }}
                                <span class="text-right pl-3 pr-16">:</span>
                            </div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium flex flex-wrap items-center">
                                <span class="w-auto overflow-hidden text-ellipsis mailto:sm:w-auto mr-4">
                                    {{ auth()->user()->email }}
                                </span>
                                @if (settings('require_email_verification') == BooleanStatusEnum::ACTIVE->value)
                                    @if (!auth()->user()->email_verified_at)
                                        <a href="{{ route('profile.verification.mail.request') }}"
                                            class="rounded-full bg-danger dark:text-white text-lara-whiteGray px-3 py-1.5 ml-3 block">{{ __('Verify') }}</a>
                                    @else
                                        <span class="rounded-full bg-lara-green dark:text-white text-lara-whiteGray px-4 py-1 block">
                                            {{ email_status(auth()->user()->email_verified_at) }}
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Account Status') }}<span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                <span
                                    class="dark:text-white text-lara-whiteGray py-1 block">{{ display_user_status(auth()->user()->is_active) }}</span>
                            </div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Member Joining At') }}<span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium"><span
                                    class="rounded-full bg-primary dark:text-white text-lara-whiteGray px-3 py-1 block">{{ auth()->user()->created_at->format('Y M d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('upload-image.js') }}"></script>
    </x-section>
</x-app-layout>
