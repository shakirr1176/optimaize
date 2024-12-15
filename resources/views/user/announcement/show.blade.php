<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('announcements.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10 bg-optm-gray-50 w-full h-full rounded-2xl overflow-hidden dark:bg-lara-gray-100">
        <div
            class="bg-optm-gray-300 w-full border-b dark:border-lara-primary flex justify-between items-center px-6 2xl:px-10 py-2 2xl:py-4">
            <h2 class="font-18 text-dark_1 font-semibold">{{ __('Announcement Information') }}</h2>
        </div>
        <div class="w-full px-6 2xl:px-10 py-6 2xl:py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="lara-label-sm">
                        {{ __('Title') }}
                    </label>
                    <div class="font-16 text-dark_2 font-medium">
                        {{ $announcement->title }}
                    </div>
                </div>
                <div>
                    <label class="lara-label-sm">
                        {{ __('Published At') }}
                    </label>
                    <div class="font-16 text-dark_2 font-medium">
                        {{ $announcement->published_at }}</div>
                </div>
                <div>
                    <label class="lara-label-sm">
                        {{ __('Status') }}
                    </label>
                    <div class="font-16 text-dark_2 font-medium">
                        {{ $announcement->is_published ? __('Published') : '' }}</div>
                </div>
                <div>
                    <label class="lara-label-sm">
                        {{ __('Description') }}
                    </label>
                    <div class="font-16 text-dark_2 font-medium">
                        {{ $announcement->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
