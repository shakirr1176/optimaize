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
        <div class="grid grid-cols-12">
            <div class="order-2 sm:order-1 col-span-12 sm:col-span-9 space-y-8">
                <div>
                    <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">
                        {{ __('Machine and Equipment Info') }}</h2>
                    <div class="col-span-12 sm:col-span-9">
                        <div class="grid grid-cols-3 gap-5 2xl:gap-6">
                            <div class="col-span-3">
                                <x-forms.text id="machine_and_equipment_name" name="machine_and_equipment_name"
                                    value="">
                                    <x-slot name="label">{{ __('machine and equipment name') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('machine_and_equipment_name') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="machine_type" name="machine_type" value="">
                                    <x-slot name="label">{{ __('machine type') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('machine_type') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="acquisition_date" name="acquisition_date" value="">
                                    <x-slot name="label">{{ __('acquisition date') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('acquisition_date') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="production_capacity" name="production_capacity" value="">
                                    <x-slot name="label">{{ __('Production capacity') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('production_capacity') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="operating_cost" name="operating_cost" value="">
                                    <x-slot name="label">{{ __('Operating Cost') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('operating_cost') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="shifts" name="shifts" value="">
                                    <x-slot name="label">{{ __('shifts') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('shifts') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="sector" name="sector" value="">
                                    <x-slot name="label">{{ __('sector') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('sector') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="status" name="status" value="">
                                    <x-slot name="label">{{ __('status') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('status') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-3 sm:col-span-2 md:col-span-1">
                                <x-forms.text id="maintenance_schedule" name="maintenance_schedule" value="">
                                    <x-slot name="label">{{ __('maintenance schedule') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('maintenance_schedule') }}</x-slot>
                                </x-forms.text>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Operations') }}
                    </h2>
                    <div
                        class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="tag-com bg-lara-blue/50"><span>cutting</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-warning/50">
                                <span>Engraving</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                        </div>
                        <button class="tag-com border-2 border-lara-gray-300 text-gray-500">
                            <span>Add more</span>
                            @svg('heroicon-s-plus', 'w-3')
                        </button>
                    </div>
                </div>
                <div>
                    <h2 class="mb-3 font-semibold dark:text-white text-dark_1 font-18">{{ __('Assign Operators') }}
                    </h2>
                    <div
                        class="flex flex-wrap items-center gap-3 px-4 font-14 py-2.5 2xl:py-3 text-dark_2 bg-optm-gray-300 outline-none w-full rounded-lara-radious">
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="tag-com bg-danger/50"><span>John Doe</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-warning/50">
                                <span>Jane Smith</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-success/50">
                                <span>Alex Johnson</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-info/50">
                                <span>Mike Lee</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                        </div>
                        <button class="tag-com border-2 border-lara-gray-300 text-gray-500">
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
                            <div class="tag-com bg-danger/50"><span>#G-001 - Cutting Machines</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-info/50">
                                <span>#G-005 - Cutting Machines Premium</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                        </div>
                        <button class="tag-com border-2 border-lara-gray-300 text-gray-500">
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
                            <div class="tag-com bg-info/50"><span>Premium Cases</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                            <div class="tag-com bg-info/50">
                                <span>Simple Assembly + Premium Painting</span>
                                <button>@svg('heroicon-s-pencil', 'w-3')</button>
                                <button class="remove-tag" type="button">
                                    @svg('heroicon-s-x-mark')
                                </button>
                            </div>
                        </div>
                        <button class="tag-com border-2 border-lara-gray-300 text-gray-500">
                            <span>Add more</span>
                            @svg('heroicon-s-plus', 'w-3')
                        </button>
                    </div>
                </div>
            </div>
            <div class="order-1 sm:order-2 col-span-12 sm:col-span-3">
                <div
                    class="parentImgUploadDiv mb-8 sm:mb-0 sm:mt-12 bg-gray-200 aspect-square max-w-[200px] w-[70%] mx-auto sm:ml-auto rounded-full">
                    <x-forms.image-upload type="file" name="icon" value="" id="icon">
                        <x-slot name="label" class="font-16">{{ __('Icon') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('icon') }}</x-slot>
                    </x-forms.image-upload>
                </div>
            </div>
        </div>
    </form>
    <x-section name="scripts">
        <script src="{{ Vite::js('file-upload.js') }}"></script>
    </x-section>
</x-app-layout>
