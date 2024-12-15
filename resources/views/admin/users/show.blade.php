<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('admin.users.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10 rounded-lara-radious bg-optm-gray-50 dark:bg-lara-darkBlack">
        <div class="row">
            <div class="w-full lg:w-1/4 px-4">
                <div class="h-full px-6 2xl:px-12 py-6 2xl:py-10">
                    <div class="w-full xl:w-auto px-3 flex items-center justify-center">
                        <div
                            class="shrink-0 mx-auto xl:mx-0 w-40 h-40 2xl:w-56 2xl:h-56 rounded-full flex justify-center items-center dark:bg-lara-gray-100/50 bg-gray-200">
                            <div
                                class="dark:bg-lara-gray-100 bg-gray-300 w-32 h-32 2xl:w-48 2xl:h-48 rounded-full overflow-hidden border-2 dark:border-lara-whiteGray border-white relative group">
                                <img src="{{ $user->avatar }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="w-full sm:w-10/12 mx-auto px-3">
                        <div class="mt-6 text-center">
                            @if ($user->password == null)
                                <span
                                    class="text-white bg-lara-blue lara-btn w-full font-medium hover:bg-danger hover:bg-opacity-90 rounded-xl">
                                    <a href="{{ route('admin.users.resend.password.create.mail', $user->id) }}"
                                        class="">{{ __('Resend Password Set Mail') }}</a>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-full lg:w-3/4 px-4">
                <div class="w-full h-full p-6 2xl:p-10">
                    <div class="w-full border-b dark:border-lara-whiteGray pb-1 mb-4">
                        <h2 class="font-18 text-dark_1 mb-3 font-semibold">{{ __('User Information') }}</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Name') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                {{ $user->fullName }}</div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('User Role') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                {{ ucwords($user->assigned_role) }}</div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Email') }}
                            </label>
                            <div
                                class="font-16 text-dark_2 font-medium">
                                <span class="w-auto overflow-hidden text-ellipsis mailto:sm:w-auto mr-4">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="lara-label-sm">
                                {{ __('Account Status') }}
                            </label>
                            <div class="font-16 text-dark_2 font-medium">
                                {{ display_user_status($user->is_active) }}
                            </div>
                        </div>
                        <div>
                            <div class="lara-label-sm">
                                {{ __('Member Joining At') }}
                            </div>
                            <div class="font-16 text-dark_2 font-medium">
                                <span
                                    class="tag-com bg-primary">{{ $user->created_at->format('Y M d') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
