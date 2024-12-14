@php

    use App\Enums\BooleanStatusEnum;
@endphp
<x-app-layout>
    <x-section name="title">{{ __('Profile') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Profile') }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10 rounded-lara-radious bg-optm-gray-50 dark:bg-lara-darkBlack">
        <div class="row">
            @include('profile.avatar')
            <div class="w-full lg:w-3/4 px-4">
                <div class="w-full h-full rounded-lg p-6 2xl:p-10">
                    <div class="flex justify-between items-center border-b dark:border-b-lara-whiteGray pb-2 mb-4">
                        <h2 class="font-18 text-dark_1 mb-3 font-semibold">{{ __('User Information') }}</h2>
                        <div>
                            <a class="lara-submit-btn" href="{{ route('profile.edit') }}">
                                @svg('heroicon-s-pencil', 'w-3')
                                <span>Edit</span>
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Name') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                {{ auth()->user()->fullName }}</div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('User') }}
                                {{ __('Role') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                {{ ucwords(auth()->user()->assigned_role) }}</div>
                        </div>
                        <div>
                            <div class="flex items-end gap-1.5 mb-1">
                                <label class="block lara-label-sm mb-0">
                                    {{ __('Email') }}
                                </label>

                                @if (settings('require_email_verification') == BooleanStatusEnum::ACTIVE->value)
                                    @if (!auth()->user()->email_verified_at)
                                        <a href="{{ route('profile.verification.mail.request') }}"
                                            class="relative group size-4 2xl:size-4 flex items-center justify-center rounded-full bg-danger text-white">
                                            @svg('heroicon-s-x-mark', 'w-3')

                                            <span
                                                class="absolute -top-full z-10 -translate-y-4 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                <span
                                                    class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10 font-semibold">{{ __('Verify') }}</span>
                                                <span
                                                    class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                            </span>
                                        </a>
                                    @else
                                        <div
                                            class="relative group flex items-center justify-center rounded-full text-success">
                                            @svg('heroicon-s-check-circle', 'w-4 2xl:w-5')

                                            <span
                                                class="absolute -top-full z-10 -translate-y-4 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                <span
                                                    class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10 font-semibold">
                                                    {{ email_status(auth()->user()->email_verified_at) }}</span>
                                                <span
                                                    class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                            </span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="font-16 text-dark_2 font-medium flex flex-wrap items-center">
                                <span class="w-auto overflow-hidden text-ellipsis mailto:sm:w-auto mr-4">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Account Status') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                <span
                                    class="dark:text-white text-lara-whiteGray py-1 block">{{ display_user_status(auth()->user()->is_active) }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Member Joining At') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium"><span
                                    class="tag-btn bg-primary">{{ auth()->user()->created_at->format('Y M d') }}</span>
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
