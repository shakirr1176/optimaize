<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <form action="" method="">
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
                    <div class="text-dark_1 dark:text-branco-sujo font-20 font-semibold">#RH-01</div>
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
        <div class="order-2 sm:order-1 col-span-12 sm:col-span-9 space-y-8">
            <div>
                <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">
                    {{ __('Section Info') }}</h2>
                <div class="col-span-12 sm:col-span-9">
                    <div class="grid grid-cols-3 gap-5 2xl:gap-6">
                        <div class="col-span-3">
                            <x-forms.text id="section_name" name="section_name" value="">
                                <x-slot name="label">{{ __('section name') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('section_name') }}</x-slot>
                            </x-forms.text>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">{{ __('Assign Operations') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 dark:bg-dark-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-com bg-lara-blue/50"><span>cutting</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button type="submit" class="tag-com border-2 border-lara-gray-300 dark:border-branco-sujo/40 text-gray-500">
                        <span>{{__('Add more')}}</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
            <div>
                <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">{{ __('Assign Associated Machines and Equipments') }}</h2>
                <div
                    class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 dark:bg-dark-optm-gray-300 outline-none w-full rounded-lara-radious">
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="tag-com bg-lara-blue/50"><span>cutting</span>
                            @svg('heroicon-s-pencil', 'w-3')
                        </button>
                    </div>
                    <button class="tag-com border-2 border-lara-gray-300 dark:border-branco-sujo/40 text-gray-500">
                        <span>{{__('Add more')}}</span>
                        @svg('heroicon-s-plus', 'w-3')
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
