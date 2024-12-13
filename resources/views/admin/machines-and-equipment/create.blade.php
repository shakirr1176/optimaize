<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb :border="true">

            <x-slot name="above">
                <a href="{{ route('admin.products.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>

            {{ $title }}

            <x-slot name="below">
                <div class="flex justify-between">
                    <div class="text-dark_1 font-20 font-semibold">#RH-01</div>
                </div>
            </x-slot>

            <x-slot name="right">
                <div class="flex items-center gap-2">
                    <button class="lara-cancel-btn">
                        @svg('heroicon-s-minus')
                        {{ __('Cancel') }}
                    </button>
                    <button class="lara-submit-btn">
                        @svg('heroicon-s-plus')
                        {{ __('Create') }}
                    </button>
                </div>
            </x-slot>
        </x-breadcrumb>
    </x-section>
    <div class="grid grid-cols-12">
        <div class="order-2 sm:order-1 col-span-12 sm:col-span-9 space-y-8">
            <div>
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">
                    {{ __('Machine and Equipment Info') }}</h2>
                <div class="col-span-12 sm:col-span-9">
                    <div class="grid grid-cols-3 gap-5 2xl:gap-6">
                        <div class="col-span-3">
                            <label class="lara-label" for="">
                                {{ __('Machine and Equipment Name') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Machine Type') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Acquisition Date') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Production Capacity') }} <span class="font-12">{{ __('(per hour)')}}</span>
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Operating Cost ') }} <span class="font-12">{{ __('(per hour)')}}</span>
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Shifts') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Sector') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Status') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-3 sm:col-span-2 md:col-span-1">
                            <label class="lara-label" for="">
                                {{ __('Maintenance Schedule') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Operations') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-btn bg-lara-blue/50"><span>cutting</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-warning/50">
                            <span>Engraving</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button class="tag-btn border-2 border-lara-gray-300 text-gray-500">
                        <span>Add more</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Operators') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-btn bg-danger/50"><span>John Doe</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-warning/50">
                            <span>Jane Smith</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-success/50">
                            <span>Alex Johnson</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-info/50">
                            <span>Mike Lee</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button class="tag-btn border-2 border-lara-gray-300 text-gray-500">
                        <span>Add more</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Groups') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-btn bg-danger/50"><span>#G-001  -  Cutting Machines</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-info/50">
                            <span>#G-005  -  Cutting Machines Premium</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button class="tag-btn border-2 border-lara-gray-300 text-gray-500">
                        <span>Add more</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Routes') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-btn bg-info/50"><span>Premium Cases</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                        <button class="tag-btn bg-info/50">
                            <span>Simple Assembly +  Premium Painting</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button class="tag-btn border-2 border-lara-gray-300 text-gray-500">
                        <span>Add more</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
        </div>
        <div class="order-1 sm:order-2 col-span-12 sm:col-span-3">
            <div
                class="mb-8 sm:mb-0 sm:mt-12 bg-gray-200 aspect-square max-w-[200px] w-[70%] mx-auto sm:ml-auto rounded-full">
            </div>
        </div>
    </div>
</x-app-layout>
