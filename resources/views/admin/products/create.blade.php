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
                <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{__('Product info')}}</h2>
                <div class="col-span-12 sm:col-span-9">
                    <div class="grid grid-cols-12 gap-5 2xl:gap-6">
                        <div class="col-span-12">
                            <label class="lara-label" for="">
                                {{ __('Product Name') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-12 sm:col-span-4 lg:col-span-5">
                            <label class="lara-label" for="">
                                {{ __('Product Category') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-12 sm:col-span-4 lg:col-span-5">
                            <label class="lara-label" for="">
                                {{ __('Subcategory') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                        <div class="col-span-12 sm:col-span-4 lg:col-span-2">
                            <label class="lara-label" for="">
                                {{ __('Production Time') }}
                            </label>
                            <input class="lara-input" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-1 sm:order-2 col-span-12 sm:col-span-3">
            <div class="mb-8 sm:mb-0 sm:mt-12 bg-gray-200 aspect-square max-w-[200px] w-[70%] mx-auto sm:ml-auto rounded-full"></div>
        </div>
    </div>
</x-app-layout>
