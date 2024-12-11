<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10">
        <div class="row justify-center">
            <div class="w-full px-4 pb-0">
                <div class="w-full h-full rounded-lg dark:bg-lara-gray-100 bg-white">
                    <div class="w-full border-b dark:border-lara-primary flex justify-between items-center px-6 2xl:px-10 py-6 2xl:py-10">
                        <h2 class="font-medium dark:text-white text-lara-whiteGray font-18">{{ __('Announcement Information') }}</h2>
                        <a href="{{ route('announcements.index') }}"
                        class="bg-lara-green text-white block hover:bg-opacity-90 lara-btn">{{ __('Back to List') }}</a>
                    </div>
                    <div class="w-full space-y-7 px-6 2xl:px-10 py-6 2xl:py-10">
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Title') }} <span class="text-right pl-3 pr-1">:</span></div>
                                <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">{{ $announcement->title }}
                            </div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Published At') }}<span class="text-right pl-3 pr-1">:</span></div>
                                <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ $announcement->published_at }}</div>
                        </div>
                        <div class="row items-center font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Status') }}<span class="text-right pl-3 pr-1">:</span></div>
                                <div class="mt-1 sm:mt-0 w-auto px-4 dark:text-white text-lara-whiteGray font-medium">
                                {{ $announcement->is_published ? __('Published') : '' }}</div>
                        </div>
                        <div class="row font-14">
                            <div class="sm:w-1/2 w-full px-4 flex sm:justify-between dark:text-white text-lara-whiteGray font-medium">
                                {{ __('Description') }} <span class="text-right pl-3 pr-1">:</span></div>
                                <div class="mt-1 sm:mt-0 px-4 dark:text-white text-lara-whiteGray font-medium sm:w-1/2 w-full">
                                <span
                                class="mt-1 sm:mt-0 w-auto dark:text-white text-lara-whiteGray font-medium">{{ $announcement->description }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
