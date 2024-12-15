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
                    <button class="lara-cancel-btn" type="reset">
                        @svg('heroicon-s-minus')
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="lara-submit-btn" type="submit">
                        @svg('heroicon-s-plus')
                        {{ __('Create') }}
                    </button>
                </div>
            </x-slot>
        </x-breadcrumb>
        <div class="grid grid-cols-12">
            <div class="order-2 sm:order-1 col-span-12 sm:col-span-9 space-y-8">
                <div>
                    <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">{{ __('Product info') }}</h2>
                    <div class="col-span-12 sm:col-span-9">
                        <div class="grid grid-cols-12 gap-5 2xl:gap-6">
                            <div class="col-span-12">
                                <x-forms.text id="product_name" name="product_name" value="">
                                    <x-slot name="label">{{ __('Product Name') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('product_name') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-12 sm:col-span-4 lg:col-span-5">
                                <x-forms.text id="product_category" name="product_category" value="">
                                    <x-slot name="label">{{ __('product category') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('product_category') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-12 sm:col-span-4 lg:col-span-5">
                                <x-forms.text id="subcategory" name="subcategory" value="">
                                    <x-slot name="label">{{ __('Subcategory') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('subcategory') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-12 sm:col-span-4 lg:col-span-2">
                                <x-forms.text id="production_time" name="production_time" value="">
                                    <x-slot name="label">{{ __('production time') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('production_time') }}</x-slot>
                                </x-forms.text>
                            </div>
                        </div>
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
