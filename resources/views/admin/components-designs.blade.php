<x-app-layout>
    <x-section name="title">{{ __('Components') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Components') }}</x-breadcrumb>
    </x-section>
    <div class="component-page rounded-xl dark:bg-lara-darkBlack bg-white p-6 mt-6">

        <div class="row">

            {{-- button section start --}}
            <div class="md:w-1/2 w-full px-4 mb-6">

                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">buttons</label>

                <label class="lara-label">{{ __('Submit Buttons') }}</label>

                {{-- Submit button full start --}}
                <div class="w-full mb-6">
                    <x-forms.button class="bg-lara-blue" type="submit">
                        {{ __('Button') }}
                    </x-forms.button>
                </div>

                <div class="w-full mb-6">
                    <x-forms.button class="bg-primary" type="submit">
                        {{ __('Button') }}
                    </x-forms.button>
                </div>
                {{-- Submit button full end --}}

                {{-- Submit button auto start --}}
                <div class="w-full mb-6">
                    <x-forms.button class="bg-lara-blue w-full" type="submit">
                        {{ __('Button') }}
                    </x-forms.button>
                </div>

                <div class="w-full mb-6">
                    <x-forms.button class="bg-primary w-full" type="submit">
                        {{ __('Button') }}
                    </x-forms.button>
                </div>
                {{-- Submit button auto end --}}

                {{-- log button start --}}
                <label class="lara-label">{{ __('logo Button') }}</label>

                <div class="w-full mb-6">
                    <x-forms.button class="bg-lara-gray-400 hover:bg-lara-blue"
                        type="button">
                        @svg('heroicon-s-funnel', 'w-4 pointer-events-none')
                    </x-forms.button>
                </div>


                {{-- log button end --}}

                <label class="lara-label">{{ __('Reset Buttons') }}</label>

                {{-- reset button full  start --}}
                <div class="w-full mb-6">
                    <x-forms.button class="bg-danger" name="{{ __('Reset') }}" type="reset">
                        {{ __('Reset') }}
                    </x-forms.button>
                </div>
                {{-- reset button full  end --}}

                {{-- reset button auto  start --}}
                <div class="w-full mb-6">
                    <x-forms.button class="bg-danger w-full" name="{{ __('Reset') }}" type="reset">
                        {{ __('Reset') }}
                    </x-forms.button>
                </div>
                {{-- reset button auto  end --}}

                {{-- radio button starts --}}

                <div class="mb-4">
                    <x-forms.radio id="direction_cr" name="direction" value="" isChecked="" :options="get_language_direction()">
                        <x-slot name="label">{{ __('Radio') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                    </x-forms.radio>
                </div>
                {{-- radio button end --}}

                {{-- check box start --}}

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="['key' => 'value']" class="inline-block">
                    <x-slot name="label">{{ __('Checkbox') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="['key' => 'value']" class="inline-block">
                    <x-slot name="label">{{ __('Checkbox big') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com w-5 h-5')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="get_language_direction()" class="inline-block mr-4">
                    <x-slot name="label">{{ __('Checkbox multiple') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="get_language_direction()" class="inline-block mr-4">
                    <x-slot name="label">{{ __('Checkbox multiple') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="['key' => 'value']" class="inline-block lara-btn px-2.5 dark:bg-lara-whiteGray bg-gray-200">
                    <x-slot name="label">{{ __('Checkbox With bg') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com w-5 h-5')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="['key' => 'value']" class="inline-block lara-btn px-2.5 dark:bg-lara-whiteGray bg-gray-200">
                    <x-slot name="label">{{ __('Checkbox With bg') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="get_language_direction()" class="inline-block lara-btn px-2.5 dark:bg-lara-whiteGray bg-gray-200">
                    <x-slot name="label">{{ __('Checkbox Multiple With bg') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>

                <x-forms.checkbox id="direction_cr" name="direction" value="" isChecked="" :options="get_language_direction()" class="inline-block lara-btn px-2.5 dark:bg-lara-whiteGray bg-gray-200">
                    <x-slot name="label">{{ __('Checkbox Multiple With bg') }}</x-slot>
                    <x-slot name="svg">@svg('heroicon-s-check', 'checked-item-com')
                    </x-slot>
                    <x-slot name="error">{{ $errors->first('direction') }}</x-slot>
                </x-forms.checkbox>
            </div>
            {{-- button section end --}}


            {{-- input section start --}}
            <div class="md:w-1/2 w-full px-4 mb-6">

                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">inputs</label>

                {{-- input start --}}

                <div class="w-full mb-6">
                    <x-forms.text id="title" name="title" value="">
                        <x-slot name="label">{{ __('Text Box') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('title') }}</x-slot>
                    </x-forms.text>
                </div>

                <div class="w-full mb-6">
                    <x-forms.textarea id="description" name="Text Area" value="">
                        <x-slot name="label">{{ __('Text Area') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('description') }}</x-slot>
                    </x-forms.textarea>
                </div>

                <div class="w-full mb-6 dark:bg-lara-gray-100 bg-gray-100 p-5 rounded-xl">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer z-10">
                            <button type="submit">
                                <svg aria-hidden="true" class="w-4 h-4 text-black-50" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <input type="search" class="lara-input-search dark:bg-lara-darkBlack bg-white text-white rounded-full"
                        placeholder="Search" required="" name="Search"
                            placeholder="{{ __('Search') }}" value="">
                    </div>
                </div>

                {{-- input end --}}

            </div>
            {{-- input section end --}}

            {{-- drop down section start --}}
            <div class="md:w-1/2 w-full px-4 mb-6">

                <div class="mb-8">
                    <div class="custom-select1">
                        <select autocomplete="off">
                          <option value="af">afganstan</option>
                          <option value="au">autralia</option>
                          <option value="bn">bangladesh</option>
                          <option value="bl">belguim</option>
                          <option value="den">denmark</option>
                          <option value="eng">england</option>
                          <option value="fin">finland</option>
                          <option value="fra">franch</option>
                          <option value="gr">greanland</option>
                          <option value="hun">hungary</option>
                          <option value="ind">india</option>
                          <option value="jam">jamaica</option>
                          <option value="kr">korea</option>
                          <option value="nz">new zeland</option>
                          <option value="wi">west indies</option>
                          <option value="pak">pakistan</option>
                          <option value="bhu">bhutan</option>
                          <option value="sa">south</option>
                          <option value="arg">argentina</option>
                          <option value="br">brazil</option>
                        </select>
                    </div>
                </div>

                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">drop downs</label>

                <div class="w-full mb-4">
                    <x-forms.select name="status" value="" :options="['active' => 'Active', 'inactive' => 'Inactive']">
                        <x-slot name="label">{{ __('Status Dropdown') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('status') }}</x-slot>
                    </x-forms.select>
                </div>


                <div class="w-full mb-6">
                    <x-forms.search-select class="" id="assigned_role" name="assigned_role" value="" :options="get_user_roles()">
                        <x-slot name="label">{{ __('Search drop down') }}</x-slot>
                        <x-slot name="error">{{ $errors->first('assigned_role') }}</x-slot>
                    </x-forms.search-select>
                </div>
            </div>
            {{-- drop down section send --}}

            {{-- alert section start --}}
            <div class="md:w-1/2 w-full px-4 mb-6">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">Alerts</label>
                <x-alert type="error" class="mb-6">
                    <h1>Error</h1>
                </x-alert>
                <x-alert type="success" class="mb-6">
                    <h1>Success</h1>
                </x-alert>
                <x-alert type="warning" class="mb-6">
                    <h1>Warning</h1>
                </x-alert>
            </div>
            {{-- alert section end --}}

            {{-- dashboard card start --}}
            <div class="md:w-1/2 w-full px-4 mb-8">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">dashboard Cards</label>

                <div class="p-5 bg-primary text-white">
                    <div class="flex items-center justify-between">
                        <p class="font-20 font-medium">{{ __('Users') }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <p class="font-34 font-medium">10</p>
                        <div class="flex items-center justify-between">
                            <p class="font-14 font-medium">+35.00</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            {{-- dashboard card end --}}

            {{-- image upload start --}}
            <div class="md:w-1/2 w-full px-4 parentImgUploadDiv">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">Image upload</label>
                    <div class="group relative">
                        <div class="drop-area flex flex-col justify-center items-center w-full h-32 dark:border-lara-whiteGray border-2 border-dashed cursor-pointer">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <img src="" alt="" class="mb-1"
                                    name="">
                                <p class="my-2 font-14 text-gray-500 dark:text-gray-400 text-center font-medium ">
                                    <span class="text-2xl flex items-center justify-center">
                                        @svg('heroicon-s-cloud-arrow-up', 'w-8')
                                    </span>
                                    <br>
                                    {{ __("Drag and Drop heres") }}<br>
                                    {{ __("or") }} <br>
                                    {{ __("Browse Files") }}
                            </p></div>
                            <div class="hidden w-32"></div>
                        </div>
                        <div class="shadow text-danger bg-white rounded-sm w-5 h-5 justify-center items-center hidden group-hover:flex absolute top-2 right-2 cursor-pointer">
                            @svg('heroicon-m-trash', 'w-4 pointer-events-none')
                        </div>
                    </div>
                    <input class="uploadImgBtn" type="file" hidden="">
            </div>
            {{-- image upload end --}}

            {{-- datatable start --}}
            <div class="w-full px-4 mb-6 p-6 ">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">data table</label>

                <!-- table section start -->
                <div class="w-full dark:bg-lara-primary bg-light-body p-6">
                    <label class="lara-label">{{ __('Data Table') }}</label>
                    <div
                        class="dark:bg-lara-darkBlack bg-white p-3 rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
                        <table class="responsive-table border-spacing-y-1.5 px-6 pb-6 border-separate w-full whitespace-nowrap">
                            <thead>
                                <tr
                                    class="text-left [&>*:nth-child(2)]:pl-0 [&>*:nth-child(2)]:border-l-0 whitespace-nowrap dark:bg-lara-darkBlack bg-white  text-black-50">

                                    <th></th>

                                    {{-- id --}}
                                    <th class="always-show 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                                        <a href="javascript:;" class="block relative">
                                            ID
                                            <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    {{-- customer name --}}
                                    <th class="resonsive-sm 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                                        <a href="javascript:;" class="block relative">
                                            Customer name
                                            <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    {{-- created date --}}
                                    <th class="resonsive-md 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                                        <a href="javascript:;" class="block relative">
                                            Create date
                                            <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    {{-- last updated --}}
                                    <th class="resonsive-xl 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                                        <a href="javascript:;" class="block relative">
                                            Last update
                                            <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    {{-- note --}}
                                    <th class="always-hidden 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                                        Notes
                                    </th>

                                    <th
                                        class="2xl:py-3 py-2.5 font-14 text-right font-medium capitalize pl-6 pr-2.5 dark:bg-lara-darkBlack bg-white">
                                        <p>Action</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-black-80">
                                <tr class="text-left [&>*:nth-child(2)]:pl-0 [&>*:nth-child(2)]:border-l-0 whitespace-nowrap dark:bg-lara-darkBlack bg-white font-14 font-medium">

                                    <td class="dark:bg-lara-whiteGray bg-light-table-row w-10">
                                        <div class="w-10">
                                            <button class="tableDropBtn w-4 h-4 2xl:w-5 2xl:h-5 mx-auto block">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-auto  text-primary">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="hidden text-danger">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 12h-15"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="hidder-column hidden">
                                            <ul class="px-4 py-1.5 2xl:py-2.5 flex flex-wrap font-14">

                                                {{-- new row last id --}}
                                                <li class="always-hidden pr-6">
                                                    <div class="flex flex-wrap">
                                                        <span class="capitalize font-semibold pr-2 text-black-50">ID
                                                            :</span>
                                                        <span class="capitalize"> 22070022</span>
                                                    </div>
                                                </li>

                                                {{-- new row last customer name --}}
                                                <li data-val="2" class="new-row-resonsive-sm pr-6">
                                                    <div class="flex flex-wrap">
                                                        <span class="capitalize font-semibold pr-2 text-black-50">customer name
                                                            :</span>
                                                        <span class="capitalize">Inditex</span>
                                                    </div>
                                                </li>

                                                {{-- new row create date --}}
                                                <li class="new-row-resonsive-md pr-6">
                                                    <div class=" flex flex-wrap">
                                                        <span class="capitalize font-semibold pr-2 text-black-50">Create date
                                                            :</span>
                                                        <span class="capitalize">
                                                            <p class="text-[#A8A8A8] font-semibold">2023-00-00</p>
                                                        </span>
                                                    </div>
                                                </li>

                                                {{-- new row last update --}}
                                                <li class="new-row-resonsive-xl pr-6">
                                                    <div class="flex flex-wrap">
                                                        <span class="capitalize font-semibold pr-2 text-black-50">last update
                                                            :</span>
                                                        <span class="capitalize"> 2023-00-00</span>
                                                    </div>
                                                </li>

                                                {{-- new row note --}}
                                                <li class="always-block pr-6">
                                                    <div class="flex flex-wrap">
                                                        <span class="capitalize font-semibold pr-2 text-black-50">note
                                                            :</span>
                                                        <span class="capitalize">Lorem ipsum</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                    {{-- id --}}
                                    <td class="px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                                        22070022
                                    </td>

                                    {{-- customer name --}}
                                    <td class="resonsive-sm px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                                        <div class="flex items-center space-x-2">
                                            <img class="w-7 h-7 object-cover rounded-full object-center"
                                                src="{{ asset('storage/images/users/avatar.jpg') }}" alt="">
                                            <p class="uppercase">Inditex</p>
                                        </div>
                                    </td>

                                    {{-- created date --}}
                                    <td class="resonsive-md px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                                        <p class="text-[#A8A8A8] font-semibold">2023-00-00 <span
                                                class="font-normal text-[#A8A8A8]/50">by Pedro Silva</span></p>
                                    </td>

                                    {{-- last updated --}}
                                    <td class="resonsive-xl px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                                        <p class="text-[#A8A8A8] font-semibold">2023-00-00 <span
                                                class="font-normal text-[#A8A8A8]/50">by Pedro Silva</span></p>
                                    </td>

                                    {{-- note --}}
                                    <td class="always-hidden px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                                        <p class="text-[#A8A8A8] font-semibold">Lorem ipsum</p>
                                    </td>

                                    {{-- action --}}
                                    <td class="px-1.5 2xl:px-2.5 py-1.5 2xl:py-2.5 text-md whitespace-normal bg-light-table-row dark:bg-lara-whiteGray">
                                        <div class="flex items-center justify-end space-x-1">
                                            <a href=""
                                                class="relative group w-8 h-8 hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 border dark:border-none border-gray-300 hover:text-white duration-300 flex items-center capitalize dark:bg-black-30 bg-white dark:bg-opacity-20 rounded-md dark:text-white text-lara-gray-400">
                                                <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                    <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Show")}}</span>
                                                    <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                </span>
                                            </a>
                                            <a href=""
                                                class="relative group w-8 h-8 hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 border dark:border-none border-gray-300 hover:text-white duration-300 flex items-center capitalize dark:bg-black-30 bg-white dark:bg-opacity-20 rounded-md dark:text-white text-lara-gray-400">
                                                <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                    </path>
                                                </svg>
                                                <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                    <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Edit")}}</span>
                                                    <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                </span>
                                            </a>
                                            <a href=""
                                                class="relative group w-8 h-8 duration-300 flex items-center capitalize bg-danger hover:bg-red-600 rounded-md text-white ">
                                                <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                    <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Delete")}}</span>
                                                    <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 flex flex-wrap items-center">
                        <div class="w-full md:w-1/2">
                            <p class="font-16 text-center text-black-50 md:text-left rounded-xl">
                                Showing: 1 - 2 of 2 data
                            </p>
                        </div>
                        <div class="mt-5 w-full md:mt-0 md:w-1/2">
                            <ul class="flex items-center justify-center space-x-3 md:justify-end">
                                <li>
                                    <span
                                        class="font-18 flex h-9 w-9 rounded-xl cursor-not-allowed items-center justify-center dark:bg-lara-darkBlack bg-gray-200 text-white">«</span>
                                </li>
                                <li>
                                    <span
                                        class="rounded-xl font-14 flex h-9 w-auto cursor-not-allowed items-center justify-center dark:bg-lara-darkBlack bg-gray-200 text-white px-3">Prev</span>
                                </li>
                                <li>
                                    <span
                                        class="font-14 bg-primary flex h-9 w-9 rounded-xl items-center justify-center bg-lara-orange text-white duration-300">1</span>
                                </li>
                                <li>
                                    <span
                                        class="font-14 flex h-9 w-auto rounded-xl cursor-not-allowed items-center justify-center dark:bg-lara-darkBlack bg-gray-200 text-white px-3">Next</span>
                                </li>
                                <li>
                                    <span
                                        class="font-18 flex h-9 w-9 rounded-xl cursor-not-allowed items-center justify-center dark:bg-lara-darkBlack bg-gray-200 text-white">»</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- table section End -->
            </div>
            {{-- datatable end --}}

            {{-- progressbar start --}}
            <div class="w-full px-4">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase" for="">Progress bar</label>
                <div class="row">
                    <div class="w-1/2 px-4 mb-6">
                        <x-progress class="bg-blue-400" percentage="40%">
                            <x-slot name="label">
                                <span class="text-[10px] text-white font-bold">40%</span>
                            </x-slot>
                        </x-progress>
                    </div>

                    <div class="w-1/2 px-4 mb-6">
                        <x-progress class="bg-blue-400" percentage="70%">
                            <x-slot name="label"></x-slot>
                        </x-progress>
                    </div>
                </div>
            </div>
            {{-- progressbar end --}}

            {{-- cards desing start --}}
            <div class="w-full px-4">
                <label class="text-black-50 font-medium font-16 pb-3 mb-6 border-b dark:border-black-50 block uppercase"
                    for="">Cards</label>

                <div class="max-w-6xl mx-auto">
                    <div class="row">
                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="shadow-xl rounded-xl overflow-hidden">
                                <div class="relative">
                                    <div class="h-52">
                                        <img class="w-full h-full object-cover object-center" src="{{ asset('storage/images/shoe.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="p-4 bg-white">
                                    <p class="uppercase tracking-wide font-16 font-bold text-lara-whiteGray">Running
                                        shoe</p>
                                    <p class="text-lara-whiteGray font-20 uppercase">Nick epic react flylnit</p>
                                    <p class="font-34 font-semibold text-primary py-2">$750,000</p>
                                    <div class="pt-2 font-16">
                                        <label for=""
                                            class="uppercase mb-1.5 block mr-8 font-semibold text-lara-whiteGray">size</label>
                                        <ul class="flex flex-wrap -mx-1 text-gray-500">
                                            <li class="px-1">
                                                <span
                                                    class="flex justify-center items-center w-9 h-9 border border-gray-300">1</span>
                                            </li>
                                            <li class="px-1">
                                                <span
                                                    class="flex justify-center items-center w-9 h-9 border border-gray-300">2</span>
                                            </li>
                                            <li class="px-1">
                                                <span
                                                    class="flex justify-center items-center w-9 h-9 border border-gray-300">3</span>
                                            </li>
                                            <li class="px-1">
                                                <span
                                                    class="flex justify-center items-center w-9 h-9 border border-gray-300">4</span>
                                            </li>
                                            <li class="px-1">
                                                <span
                                                    class="flex justify-center items-center w-9 h-9 border border-gray-300">5</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bg-gray-50 flex p-4 space-x-2 border-t border-gray-300 text-lara-whiteGray">
                                    <button class="lara-btn bg-lara-blue text-white font-bold">add to cart</button>
                                    <button class="lara-btn bg-lara-blue text-white font-bold">
                                        <svg class="h-4 w-4 text-white fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="rounded-md bg-white">
                                <header class="p-4 pb-0">
                                    <div class="font-semibold font-20">Card Title</div>
                                    <div class="font-medium text-gray-500 fomt-16">Card Subtitle</div>
                                </header>
                                <main class="p-4">
                                    <div class="h-[140px] rounded-md w-full mb-6">
                                        <img src="{{ asset('storage/images/shoe.jpg') }}" alt="" class="block w-full h-full object-cover rounded-md">
                                    </div>
                                    <div class="font-16 text-gray-500">Lorem ipsum dolor sit amet, consec tetur
                                        adipiscing elit, sed do eiusmod tempor incididun ut .
                                    </div>
                                    <div class="mt-4 space-x-4">
                                        <a class="underline hover:text-gray-800 font-16 text-gray-700"
                                            href="/card">Learn more</a>
                                        <a class="underline hover:text-gray-800 font-16 text-gray-700"
                                            href="/card">Another link</a>
                                    </div>
                                </main>
                            </div>
                        </div>
                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="rounded-xl overflow-hidden">
                                <div class="h-[140px] w-full">
                                    <img src="{{ asset('storage/images/shoe.jpg') }}" alt="" class="block w-full h-full object-cover rounded-md">
                                </div>
                                <main class="p-4 bg-white">
                                    <header class="mb-4">
                                        <div class="font-semibold font-20">Card Title</div>
                                        <div class="font-medium text-gray-500 fomt-16">Card Subtitle</div>
                                    </header>
                                    <div class="font-16 text-gray-500">Lorem ipsum dolor sit amet, consec tetur
                                        adipiscing elit, sed do eiusmod tempor incididun ut .
                                    </div>
                                    <div class="mt-4 space-x-4">
                                        <a class="underline hover:text-gray-800 font-16 text-gray-700"
                                            href="/card">Learn more</a>
                                        <a class="underline hover:text-gray-800 font-16 text-gray-700"
                                            href="/card">Another link</a>
                                    </div>
                                </main>
                            </div>
                        </div>
                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="p-4 bg-white border border-gray-400 rounded">
                                <div class="h-[144px]">
                                    <a href="#"><img src="{{ asset('storage/images/shoe.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="py-4 border-b border-gray-400 font-semibold text-gray-800">
                                    <h3 class="font-20 ">
                                        <a href="#">Lorem ipsum dolor sit amet</a>
                                    </h3>
                                </div>
                                <div class="py-6">
                                    <p class="font-14 text-gray-500">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                        nonummy nibh
                                        euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...
                                    </p>
                                </div>
                                <div class="font-16 flex justify-between text-gray-600 space-x-4">
                                    <span>
                                        Jul 07, 2022
                                    </span>
                                    <span class="flex space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>

                                        <span> BootExperts</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="relative">
                                <figure class="aspect-square">
                                    <a class="w-full h-full block" href="javascript:;">
                                        <img class="w-full h-full object-cover" src="{{ asset('storage/images/tech.jpg') }}" alt="">
                                    </a>
                                </figure>
                                <span class="absolute right-4 top-4 p-3.5 bg-primary text-white font-14">
                                    <span class="block">28</span>
                                    <span class="uppercase block">oct</span>
                                </span>
                            </div>
                            <div class="content-box p-4 bg-white">
                                <ul class="flex justify-between pt-4 pb-5  text-gray-500 font-18">
                                    <li class="flex flex-wrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 mr-2 text-primary">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        <span>
                                            by Admin
                                        </span>
                                    </li>
                                    <li class="flex flex-wrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4 mr-2 text-primary">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                        <span>
                                            Technology
                                        </span>
                                    </li>
                                </ul>
                                <h4 class="font-20 text-gray-800 hover:text-primary font-semibold mb-6"><a
                                        href="javascript:;">Professional technology information &amp;
                                        solutions are just like…</a></h4>
                            </div>
                            <div class="bg-gray-200 group p-4 flex items-center justify-between">
                                <a href="javascript:;" class="read-more flex text-gray-600">
                                    <span class="font-16 mr-2">Read More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 text-primary group-hover:translate-x-1/2 duration-300">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>

                                </a>
                                <div class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 mr-1 text-primary">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                                    </svg>
                                    <span class="font-16 ml-2">02</span>
                                </div>
                            </div>
                        </div>

                        <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 pb-8 px-4">
                            <div class="bg-white shadow">
                                <span class="bg-info h-2.5 w-full block rounded-b-full"></span>
                                <div class="p-4">
                                    <div class="flex justify-between">
                                        <small class="block mb-1 text-gray-500 font-14">Sales Overview</small>
                                        <p class="text-primary font-18">+18.2%</p>
                                    </div>
                                    <h4 class="mb-1 text-gray-700 font-34 font-medium">$42.5k</h4>
                                    <div class="row relative">
                                        <span
                                            class="w-px h-full bg-gray-300 absolute left-1/2 -translate-x-1/2"></span>
                                        <div class="w-1/2 px-4">
                                            <div class="text-gray-700 flex items-center mb-2">
                                                <span class="pr-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                    </svg>
                                                </span>
                                                <p>Order</p>
                                            </div>
                                            <h5 class="mb-0 pt-1 text-gray-800">62.2%</h5>
                                            <small class="text-gray-500">6,440</small>
                                        </div>
                                        <div class="w-1/2 px-4 text-right">
                                            <div class="text-gray-700 flex justify-end items-center mb-2">
                                                <p>Visits</p>
                                                <span class="pl-2 rounded">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <h5 class="text-gray-800">25.5%</h5>
                                            <small class="text-gray-500">12,749</small>
                                        </div>
                                    </div>

                                    <div class="w-full flex mt-6 rounded-full overflow-hidden">
                                        <div class="bg-info h-2" style="width: 70%" role="progressbar"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="bg-primary h-2" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- cards desing end --}}
        </div>
    </div>
    <x-section name="style">
        <link rel="stylesheet" href="{{ Vite::css('select.css') }}" />
    </x-section>
    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('search-select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('table.js') }}"></script>
        <script src="{{ Vite::js('file-upload.js') }}"></script>
        <script src="{{ Vite::js('select.js') }}"></script>

        <script>

                let customSelect1 = document.querySelector(".custom-select1");

                turnIntoCustom(customSelect1,{
                   search: true,
                   multiple: true,
                   default_selected_text:'select country',
                   fetchWithSearch: (value)=> `http://laraframe.test/test?search=${value}`
                });

        </script>
    </x-section>
</x-app-layout>
