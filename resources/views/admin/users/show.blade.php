<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10">
        <div class="row">
            <div class="w-full xl:w-1/3 px-4 mb-8 2xl:mb-0">
                <div class="dark:bg-lara-gray-100 bg-white rounded-lg h-full py-12 px-6 2xl:px-12 2xl:py-16">
                    <div class="w-full xl:w-auto px-3 flex items-center justify-center">
                        <div
                            class="shadow-lara-shadow3 mx-auto xl:mx-0 w-40 h-40 2xl:w-56 2xl:h-56 rounded-full flex justify-center items-center dark:bg-lara-gray-100/50 bg-gray-200">
                            <div class="dark:bg-lara-gray-100 bg-gray-300 w-32 h-32 2xl:w-48 2xl:h-48 rounded-full overflow-hidden border-2 dark:border-lara-whiteGray border-white relative group">
                                    <img src="{{ $user->avatar }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-10/12 mx-auto px-3">
                        <div class="mt-6 text-center">
                            <h2 class="text-primary font-semibold font-24">{{ $user->fullName }}</h2>
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

            <div class="w-full px-4 xl:w-2/3 pb-0">
                <div class="w-full h-full rounded-lg dark:bg-lara-darkBlack bg-white p-6 2xl:p-10">
                    <div class="w-full border-b dark:border-lara-whiteGray pb-1 mb-4">
                        <h2 class="font-medium dark:text-white text-lara-whiteGray font-20 pb-4">{{ __('User Information') }}</h2>
                    </div>
                    <div class="w-full space-y-7 py-6">
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Name') }}<span class="text-right pl-3 pr-16">:</span>
                            </div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ $user->fullName }}</div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('User Role') }} <span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ ucwords($user->assigned_role) }}</div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Email') }}<span class="text-right pl-3 pr-16">:</span>
                            </div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium flex flex-wrap items-center">
                                <span class="w-auto overflow-hidden text-ellipsis mailto:sm:w-auto mr-4">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Account Status') }}<span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                <span
                                    class="rounded-full text-white px-4 py-1 block">{{ display_user_status($user->is_active) }}</span>
                            </div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Member Joining At') }}<span class="text-right pl-3 pr-16">:</span></div>
                            <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium"><span
                                    class="rounded-full bg-primary text-white px-3 py-1 block">{{ $user->created_at->format('Y M d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
