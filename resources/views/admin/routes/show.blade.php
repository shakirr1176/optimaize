<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('admin.routes.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="rounded-2xl bg-optm-gray-50 dark:bg-dark_2 overflow-hidden">
        <div id="show-4-tab" class="flex flex-wrap font-16 font-semibold items-center">
            <button class="tabButton active duration-300 flex-1 min-w-[200px]">Information</button>
            <button class="tabButton duration-300 flex-1 min-w-[200px]">Hours and Vacation Map</button>
            <button class="tabButton duration-300 flex-1 min-w-[200px]">Competencies</button>
        </div>
        <div class="p-6">
            <div id="show-4-tab-content">
                <div class="tab">
                    <h2 class="font-18 text-dark_1 dark:text-branco-sujo mb-5 2xl:mb-6 font-semibold">{{ __('Route info') }}</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div>
                            <label class="lara-label-sm">SECTION Name</label>
                            <p class="show-value">Standard Assembly Route</p>
                        </div>
                        <div>
                            <label class="lara-label-sm">Operating Cost (per hour)</label>
                            <p class="show-value">20€</p>
                        </div>
                        <div>
                            <label class="lara-label-sm">Created Date</label>
                            <p class="show-value">2020-03-15</p>

                        </div>
                        <div>
                            <label class="lara-label-sm">Estimated Completion Time</label>
                            <div class="tag-com bg-success/50">60 min</div>

                        </div>
                    </div>
                </div>
                <div class="tab h-full">
                    <span class="show-no-data">
                        {{__("No data")}}
                    </span>
                </div>
                <div class="tab h-full">
                    <span class="show-no-data">
                        {{__("No data")}}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('tab.js') }}"></script>
        <script>
            tabFunc('show-4-tab');
        </script>
    </x-section>
</x-app-layout>
