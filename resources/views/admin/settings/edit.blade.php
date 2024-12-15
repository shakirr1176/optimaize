<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>

    <div class="mt-6 2xl:mt-10 w-full">
        <div class="row">
            <div class="md:w-1/3 w-full px-4 mb-6 md:mb-0">
                <div class="dark:bg-lara-darkBlack bg-optm-gray-300 rounded 2xl:py-4 md:py-2 py-2 px-6">
                    <p class="font-16 text-center lg:text-left dark:text-white text-lara-whiteGray font-medium">
                        {{ __('Settings') }}</p>
                </div>
                <ul class="mt-3">
                    @foreach ($settings['settingSections'] as $key => $value)
                        @if (!empty($value['sub-settings']))
                            <li
                                class="{{ $type == $key ? 'group dark:bg-primary bg-gray-400/80 text-white' : 'dark:bg-lara-darkBlack bg-gray-400/80 group dark:hover:bg-primary hover:bg-gray-400/80 dark:text-white text-white' }} flex items-center justify-between duration-300 2xl:py-4 md:py-2 py-1.5 px-5 rounded-t mt-1.5">
                                <div class="flex font-16 items-center space-x-4">
                                    @svg('heroicon-s-home', 'w-4')
                                    <p class="font-medium">{{ __(ucwords(preg_replace('/[-_]+/', ' ', $key))) }}</p>
                                </div>
                                @svg('heroicon-s-chevron-right', 'w-4')
                            </li>
                            <ul class="dark:text-white text-lara-whiteGray dark:bg-lara-whiteGray bg-optm-gray-50">
                                @foreach ($value['sub-settings'] as $itemKey => $item)
                                    <li class="">
                                        <a href="{{ route('admin.settings.edit', ['type' => $key, 'sub_type' => $item]) }}"
                                            class="block transform px-6 2xl:py-3 py-2 group font-14 font-medium duration-300 {{ $sub_type == $item ? 'dark:bg-primary bg-optm-gray-300 dark:bg-opacity-40 bg-opacity-40' : 'dark:hover:bg-primary hover:bg-gray-400 dark:hover:bg-opacity-40 hover:bg-opacity-40' }}">{{ __(ucwords(preg_replace('/[-_]+/', ' ', $item))) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="md:w-2/3 w-full px-4 mt-3 md:mt-0">
                <div class="dark:bg-lara-darkBlack bg-optm-gray-300 rounded 2xl:py-4 md:py-2 py-2 px-6">
                    <p class="font-16 text-center lg:text-left dark:text-white text-lara-whiteGray font-medium">
                        {{ ucwords(preg_replace('/[-_]+/', ' ', $sub_type)) . ' ' . __('Settings') }}</p>
                </div>
                <div class="dark:bg-lara-darkBlack bg-optm-gray-50 rounded p-6 sm:p-8 2xl:p-14 mt-3">
                    <form action="{{ route('admin.settings.update', ['type' => $type, 'sub_type' => $sub_type]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @foreach ($settings['fieldsGroup'] as $name => $field)
                            @if ($field['field_type'] == 'text')
                                <div class="w-full mb-6">
                                    <x-forms.text id="{{ get_settings_name($name) }}"
                                        name="{{ get_settings_name($name) }}"
                                        value="{{ settings($name, isset($field['default']) ? $field['default'] : null) }}"
                                        placeholder="{{ isset($field['placeholder']) ? __($field['placeholder']) : __($field['field_label']) }}">

                                        <x-slot name="label">{{ __($field['field_label']) }}</x-slot>
                                        <x-slot name="error">{{ $errors->first(get_settings_name($name)) }}</x-slot>
                                    </x-forms.text>
                                </div>
                            @endif

                            @if ($field['field_type'] == 'radio')
                                <div class="w-full mb-6">
                                    <x-forms.radio id="{{ $loop->iteration }}" name="{{ get_settings_name($name) }}"
                                        value="{{ settings($name) }}" :options="call_user_func_array($field['field_value'], [])"
                                        isChecked="{{ settings($name) }}">

                                        <x-slot name="label">{{ __($field['field_label']) }}</x-slot>
                                        <x-slot name="error">{{ $errors->first(get_settings_name($name)) }}</x-slot>
                                    </x-forms.radio>
                                </div>
                            @endif

                            @if ($field['field_type'] == 'select')
                                @php
                                    $options = is_array($field['field_value'])
                                        ? $field['field_value']
                                        : call_user_func_array($field['field_value'], []);
                                @endphp

                                @isset($field['dependent_fields'])
                                    <div class="dependent-field">
                                    @endisset

                                    <div class="w-full mb-6">
                                        <x-forms.select id="{{ $loop->iteration }}"
                                            name="{{ get_settings_name($name) }}"
                                            value="{{ settings($name, isset($field['default']) ? $field['default'] : null) }}"
                                            :options="$options">

                                            <x-slot name="label" class="font-16">{{ __($field['field_label']) }}
                                            </x-slot>
                                            <x-slot name="error">{{ $errors->first(get_settings_name($name)) }}
                                            </x-slot>
                                        </x-forms.select>
                                    </div>

                                    @isset($field['dependent_fields'])
                                        @foreach ($field['dependent_fields'] as $parentValue => $dependentFields)
                                            <div class="dependent-fields-div {{ $parentValue }} hidden">
                                                @foreach ($dependentFields as $dependentFieldName => $dependentFieldOptions)
                                                    @if ($dependentFieldOptions['field_type'] == 'text')
                                                        <div class="w-full mb-6">
                                                            <x-forms.text disabled
                                                                id="{{ get_settings_name($dependentFieldName) }}"
                                                                name="{{ get_settings_name($dependentFieldName) }}"
                                                                value="{{ settings($dependentFieldName, isset($dependentFieldOptions['default']) ? $dependentFieldOptions['default'] : null) }}"
                                                                placeholder="{{ isset($dependentFieldOptions['placeholder']) ? __($dependentFieldOptions['placeholder']) : __($dependentFieldOptions['field_label']) }}">

                                                                <x-slot name="label">
                                                                    {{ __($dependentFieldOptions['field_label']) }}
                                                                </x-slot>
                                                                <x-slot name="error">
                                                                    {{ $errors->first(get_settings_name($dependentFieldName)) }}
                                                                </x-slot>
                                                            </x-forms.text>
                                                        </div>
                                                    @endif

                                                    @if ($dependentFieldOptions['field_type'] == 'radio')
                                                        <div class="w-full mb-6">
                                                            <x-forms.radio disabled id="{{ $loop->iteration }}"
                                                                name="{{ get_settings_name($dependentFieldName) }}"
                                                                value="{{ settings($dependentFieldName) }}"
                                                                :options="call_user_func_array(
                                                                    $dependentFieldOptions['field_value'],
                                                                    [],
                                                                )"
                                                                isChecked="{{ settings($dependentFieldName) }}">

                                                                <x-slot name="label">
                                                                    {{ __($dependentFieldOptions['field_label']) }}
                                                                </x-slot>
                                                                <x-slot name="error">
                                                                    {{ $errors->first(get_settings_name($dependentFieldName)) }}
                                                                </x-slot>
                                                            </x-forms.radio>
                                                        </div>
                                                    @endif

                                                    @if ($dependentFieldOptions['field_type'] == 'select')
                                                        @php
                                                            $options = is_array($dependentFieldOptions['field_value'])
                                                                ? $dependentFieldOptions['field_value']
                                                                : call_user_func_array(
                                                                    $dependentFieldOptions['field_value'],
                                                                    [],
                                                                );
                                                        @endphp

                                                        <div class="w-full mb-6">
                                                            <x-forms.select disabled id="{{ $loop->iteration }}"
                                                                name="{{ get_settings_name($dependentFieldName) }}"
                                                                value="{{ settings($dependentFieldName, isset($dependentFieldOptions['default']) ? $dependentFieldOptions['default'] : null) }}"
                                                                :options="$options">

                                                                <x-slot name="label" class="font-16">
                                                                    {{ __($dependentFieldOptions['field_label']) }}
                                                                </x-slot>
                                                                <x-slot name="error">
                                                                    {{ $errors->first(get_settings_name($dependentFieldName)) }}
                                                                </x-slot>
                                                            </x-forms.select>
                                                        </div>
                                                    @endif

                                                    @if ($dependentFieldOptions['field_type'] == 'image')
                                                        <div class="w-full mb-6 parentImgUploadDiv">
                                                            <x-forms.image disabled type="file"
                                                                name="{{ get_settings_name($dependentFieldName) }}"
                                                                id="{{ get_settings_name($dependentFieldName) }}">

                                                                <x-slot name="label" class="font-16">
                                                                    {{ __($dependentFieldOptions['field_label']) }}
                                                                </x-slot>
                                                                <x-slot name="error">
                                                                    {{ $errors->first(get_settings_name($dependentFieldName)) }}
                                                                </x-slot>
                                                            </x-forms.image>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            @endif

                            @if ($field['field_type'] == 'image')
                                <div class="w-full mb-6 parentImgUploadDiv">
                                    <x-forms.image type="file" name="{{ get_settings_name($name) }}"
                                        id="{{ get_settings_name($name) }}">

                                        <x-slot name="label" class="font-16">{{ __($field['field_label']) }}</x-slot>
                                        <x-slot name="error">{{ $errors->first(get_settings_name($name)) }}</x-slot>
                                    </x-forms.image>
                                </div>
                            @endif
                        @endforeach

                        <div class="flex flex-wrap gap-x-4 gap-y-2 w-full mt-8">
                            <x-forms.button class="lara-cancel-btn px-10" name="{{ __('Reset') }}" type="reset">
                                {{ __('Reset') }}
                            </x-forms.button>
                            <x-forms.button class="lara-submit-btn" name="{{ __('Update Setting') }}"
                                type="submit">{{ __('Update Setting') }}
                            </x-forms.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('file-upload.js') }}"></script>
        <script>
            function showDependentFieldDiv(e) {
                let parent = e.closest('.dependent-field');
                let dependentFieldsDivs = parent.querySelectorAll(".dependent-fields-div")
                dependentFieldsDivs?.forEach(function(de) {
                    de.classList.add('hidden');
                    let inputs = de.querySelectorAll("input");
                    inputs?.forEach(function(te) {
                        te.disabled = true;
                    });
                    let selects = de.querySelectorAll("select");
                    selects?.forEach(function(te) {
                        te.disabled = true;
                    });
                });

                let value = e.getAttribute("data-value");
                if (value) {
                    let row = parent.getElementsByClassName(value);
                    if (row[0]) {
                        row[0].classList.remove('hidden');
                        let inputs = row[0].querySelectorAll("input");
                        inputs?.forEach(function(te) {
                            te.disabled = false;
                        });

                        let selects = row[0].querySelectorAll("select");
                        selects?.forEach(function(te) {
                            te.disabled = false;
                        });
                    }

                }
            }

            var dependentFieldSelects = document.querySelectorAll(".dependent-field  .select-items > div");
            dependentFieldSelects?.forEach(function(el, ind) {
                el.addEventListener("click", function() {
                    showDependentFieldDiv(el);
                });
            });

            window.addEventListener("load", function() {
                let dependentFieldSelects = document.querySelectorAll(".dependent-field select");
                dependentFieldSelects?.forEach(function(el, ind) {
                    let options = el.closest('.dependent-field').querySelectorAll(".select-items > div");
                    options.forEach(function(item) {
                        if (item.getAttribute('data-value') == el.value) {
                            item.click();
                        }
                    });
                });
            });
        </script>
    </x-section>
</x-app-layout>
