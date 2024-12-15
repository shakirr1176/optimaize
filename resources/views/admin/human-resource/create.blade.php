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
                    <a href="{{ route('admin.human-resource.index') }}" class="lara-cancel-btn">
                        @svg('heroicon-s-minus')
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" class="lara-submit-btn">
                        @svg('heroicon-s-plus')
                        {{ __('Create') }}
                    </button>
                </div>
            </x-slot>
            
        </x-breadcrumb>
        <div class="grid grid-cols-12">
            <div class="order-2 sm:order-1 col-span-12 sm:col-span-9 space-y-8">
                <div>
                    <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">{{ __('Personal info') }}</h2>
                    <div class="col-span-12 sm:col-span-9">
                        <div class="grid grid-cols-2 gap-5 2xl:gap-6">
                            <div class="col-span-2">
                                <x-forms.text id="full_name" name="full_name" value="">
                                    <x-slot name="label">{{ __('Full Name') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('full_name') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="date_of_birth" name="date_of_birth" value="">
                                    <x-slot name="label">{{ __('Date of birth') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('date_of_birth') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="birthplace" name="birthplace" value="">
                                    <x-slot name="label">{{ __('Birthplace') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('birthplace') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="email" name="email" value="">
                                    <x-slot name="label">{{ __('Email') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('email') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="phone_contact" name="phone_contact" value="">
                                    <x-slot name="label">{{ __('Phone Contact') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('phone_contact') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2">
                                <x-forms.text id="address" name="address" value="">
                                    <x-slot name="label">{{ __('Address') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('address') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="postal_code" name="postal_code" value="">
                                    <x-slot name="label">{{ __('Postal Code') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('postal_code') }}</x-slot>
                                </x-forms.text>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <x-forms.text id="location" name="location" value="">
                                    <x-slot name="label">{{ __('Location') }}</x-slot>
                                    <x-slot name="error">{{ $errors->first('location') }}</x-slot>
                                </x-forms.text>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="mb-3 font-semibold dark:text-branco-sujo text-dark_1 font-18">{{ __('Company Info') }}</h2>
                    <div class="grid grid-cols-2 gap-5 2xl:gap-6">
                        <div class="col-span-2 md:col-span-1">
                            <x-forms.text id="position" name="position" value="">
                                <x-slot name="label">{{ __('position') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('position') }}</x-slot>
                            </x-forms.text>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-forms.text id="department" name="department" value="">
                                <x-slot name="label">{{ __('department') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('department') }}</x-slot>
                            </x-forms.text>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-forms.text id="admission_date" name="admission_date" value="">
                                <x-slot name="label">{{ __('Admission Date') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('admission_date') }}</x-slot>
                            </x-forms.text>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-forms.text id="access_level" name="access_level" value="">
                                <x-slot name="label">{{ __('Access Level') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('access_level') }}</x-slot>
                            </x-forms.text>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <div class="grid grid-cols-2 gap-5 2xl:gap-6">
                                <div>
                                    <x-forms.text id="hourly_value" name="hourly_value" value="">
                                        <x-slot name="label">{{ __('Hourly Value') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('hourly_value') }}</x-slot>
                                    </x-forms.text>
                                </div>
                                <div>
                                    <x-forms.text id="working_hours" name="working_hours" value="">
                                        <x-slot name="label">{{ __('Working Hours') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('working_hours') }}</x-slot>
                                    </x-forms.text>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <x-forms.text id="shift" name="shift" value="">
                                <x-slot name="label">{{ __('shift') }}</x-slot>
                                <x-slot name="error">{{ $errors->first('shift') }}</x-slot>
                            </x-forms.text>
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
