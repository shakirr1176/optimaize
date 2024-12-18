@aware(['data'])

<div class="filter-group font-12 relative mt-4 w-full 2xl:mt-8">
    <div class="flex flex-wrap items-center gap-x-4 gap-y-3 mb-3">
        <div class="w-full sm:w-1/2 search-yield flex flex-wrap items-center gap-3">
            @if ($data->searchButtons)
                <div class="flex flex-wrap items-center space-x-2">
                    @foreach ($data->searchButtons as $searchButton)
                        @if ($searchButton['has_permission'])
                            <a href="{{ $searchButton['url'] }}"
                                class="{{ $searchButton['btn_class'] }} text-white {{ $searchButton['btn_type_icon'] ? '2xl:p-2.5 p-1' : 'px-8' }} inline-flex">{{ $searchButton['name'] }}</a>
                        @endif
                    @endforeach
                </div>
            @endif
            @if (count($data->searchFields) > 0)
                <form class="flex-1" autocomplete="off" class="">
                    <div class="flex items-center gap-3">
                        @if ($data->searchOptions['show_searchable_columns'])
                            <div class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex flex-wrap relative">
                                <button type="button"
                                    class="tableOptionButton py-3 2xl:py-4 text-dark_2 dark:text-optm-gray-200 search-drop-down-btn overflow-hidden text-ellipsis justify-between px-3 2xl:px-4 flex items-center">
                                    <span
                                        class="selected-text-1 text-left min-w-[60px] 2xl:min-w-[70px] overflow-hidden text-ellipsis">{{ request()->query($data->getPageName() . '-srch-field') ? $data->searchFields[request()->query($data->getPageName() . '-srch-field')]['label'] : __('All') }}</span>
                                    @svg('heroicon-s-chevron-down', 'w-3.5 2xl:w-4')
                                </button>

                                <div
                                    class="filter-search-option-1 optionModal hidden rounded-lara-radious overflow-hidden min-w-[80px] absolute z-30 top-full left-2 mt-1.5 shadow-lara-shadow2 dark:shadow-[0_4px_10px_#0000008c]">
                                    <ul>
                                        <li data-value=""
                                            class="w-full drop-down-list cursor-pointer px-3 2xl:px-4 py-[5px] flex items-center space-x-2 dropdown-list-color group">
                                            <span
                                                class="pointer-events-none whitespace-nowrap">{{ __('All') }}</span>
                                        </li>
                                        @foreach ($data->searchFields as $fieldName => $fieldOption)
                                            <li data-value="{{ $fieldName }}"
                                                class="w-full drop-down-list cursor-pointer px-3 2xl:px-4 py-[5px] flex items-center space-x-2 dropdown-list-color group">
                                                <span
                                                    class="pointer-events-none whitespace-nowrap">{{ $fieldOption['label'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if ($data->searchOptions['show_search_conditions'])
                            <div class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex flex-wrap relative">

                                <button type="button"
                                    class="tableOptionButton py-3 2xl:py-4 text-dark_2 dark:text-optm-gray-200 search-drop-down-btn overflow-hidden text-ellipsis justify-between px-3 2xl:px-4 flex items-center">
                                    <span
                                        class="selected-text-2 text-left min-w-[40px] 2xl:min-w-[50px] overflow-hidden text-ellipsis">{{ $data->searchConditions[request()->query($data->getPageName() . '-srch-cond', 'similar')] }}</span>
                                    @svg('heroicon-s-chevron-down', 'w-3.5 2xl:w-4')
                                </button>

                                <div
                                    class="filter-search-option-2 optionModal hidden rounded-lara-radious overflow-hidden min-w-[100px] absolute z-30 top-full right-0 mt-1.5 shadow-lara-shadow2 dark:shadow-[0_4px_10px_#0000008c]">
                                    <ul>
                                        @foreach ($data->searchConditions as $fieldName => $fieldLabel)
                                            <li data-value="{{ $fieldName }}"
                                                class="w-full drop-down-list cursor-pointer px-3 2xl:px-4 py-2 2xl:py-3 flex items-center space-x-2 text-dark_2 dark:text-lara-primary bg-white dark:bg-lara-gray-300 hover:bg-gray-100 dark:hover:bg-dark_1 hover:text-lara-primary dark:hover:text-white group">
                                                <span
                                                    class="pointer-events-none whitespace-nowrap">{{ $fieldLabel }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="flex-1 relative">
                            <div
                                class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center cursor-pointer z-10">
                                <button class="search-icon font-thin">

                                    @svg('heroicon-s-magnifying-glass', 'w-4 2xl:w-5 text-dark_2 dark:text-optm-gray-200')

                                </button>
                            </div>

                            <input type="search" class="min-w-[200px] lara-input-search " name="{{ $data->getPageName() }}-srch"
                                placeholder="{{ __('Search') }}"
                                value="{{ request()->query($data->getPageName() . '-srch') }}">

                            <button type="submit"
                                class="z-10 search-cancel-btn absolute right-4 top-1/2 -translate-y-1/2 transform text-xs font-thin text-black-50">
                                @svg('heroicon-s-x-mark', 'w-4 pointer-events-none')
                            </button>
                            @if ($data->pageOptions['show_per_page_options'] && request()->has($data->getPageName() . '-per-page'))
                                <input type="hidden" name="{{ $data->getPageName() }}-per-page"
                                    value="{{ $data->pageOptions['per_page'] }}">
                            @endif

                            @if ($data->searchOptions['show_searchable_columns'])
                                <input class="search-hidden-input-1" type="hidden"
                                    name="{{ $data->getPageName() }}-srch-field"
                                    value="{{ request()->query($data->getPageName() . '-srch-field') }}">
                            @endif

                            @if ($data->searchOptions['show_search_conditions'])
                                <input class="search-hidden-input-2" type="hidden"
                                    name="{{ $data->getPageName() }}-srch-cond"
                                    value="{{ request()->query($data->getPageName() . '-srch-cond', 'similar') }}">
                            @endif
                        </div>

                    </div>
                    @foreach ($data->datatableFields as $properties)
                        @if ($properties['filterable'])
                            @foreach ($properties['filter_data'] as $optionValue => $optionLabel)
                                @if (is_array(request()->input($data->getPageName() . '-fltr.' . $properties['field_name'])) &&
                                        in_array($optionValue, request()->input($data->getPageName() . '-fltr.' . $properties['field_name'])))
                                    <input type="hidden"
                                        name="{{ $data->getPageName() }}-fltr[{{ $properties['field_name'] }}][]"
                                        value="{{ $optionValue }}">
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </form>
            @endif
            @if ($data->pageOptions['show_per_page_options'])

                <div
                    class="border dark:border-0 bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex flex-wrap relative">
                    <button type="button"
                        class="tableOptionButton py-3 2xl:py-4 text-dark_2 dark:text-optm-gray-200 search-drop-down-btn overflow-hidden text-ellipsis justify-between px-3 flex items-center">
                        <span
                            class="selected-text-3 text-left min-w-[50px] 2xl:min-w-[60px] per-page-selected overflow-hidden text-ellipsis">{{ __('Show :value', ['value' => $data->pageOptions['per_page']]) }}</span>
                        @svg('heroicon-s-chevron-down', 'w-3.5 2xl:w-4')
                    </button>

                    <div data-pagename="{{ $data->getPageName() }}"
                        class="filter-search-option-3 optionModal hidden rounded-lara-radious overflow-hidden min-w-[80px] absolute z-30 top-full left-0.5 mt-1.5 shadow-lara-shadow2 dark:shadow-[0_4px_10px_#0000008c]">
                        <ul>
                            @foreach ($data->pageOptions['per_page_options'] as $perPageOption)
                                <li data-value="{{ $perPageOption }}"
                                    class="{{ request()->get($data->getPageName() . '-per-page') == $perPageOption ? 'active' : '' }} dropdown-list-color w-full drop-down-list cursor-pointer px-3 2xl:px-4 py-[5px] flex items-center space-x-2 group">
                                    <span class="pointer-events-none whitespace-nowrap">{{ $perPageOption }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

        </div>
        <div class="flex-1 flex sm:justify-end space-x-1.5 2xl:space-x-2 font-12">

            @isset($buttons)
                {{ $buttons }}
            @endisset

            @if ($data->showDownloadButton)
                <div class="relative">
                    <button
                        class="download-btn lara-logo-btn bg-optm-purple text-white">
                        @svg('heroicon-s-folder-arrow-down', 'w-3.5 pointer-events-none')
                    </button>
                    <div
                        class="download-drop duration-300 rounded-xl overflow-hidden absolute z-10 top-full sm:right-0 -right-[184px] mt-3 hidden w-52 shadow-lara-shadow2 2xl:w-56">
                        @foreach (datatable_downloadable_type() as $item => $value)
                            <a class="download group dropdown-list-color block py-2 px-4
                                data-type="{{ $item }}"
                                href="{{ generate_filter_url('download', $item) }}">
                                @svg(get_heroicon_name($value['icon']), 'w-4 pointer-events-none text-lara-darkBlack dark:group-hover:text-white inline-block')
                                <span class="pointer-events-none">{{ $value['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($data->showDateFilter)
                <div>
                    <button
                        class="filter-btn duration-300 dark:border-none lara-logo-btn bg-optm-purple text-white">
                        @svg('heroicon-s-funnel', 'w-3.5 pointer-events-none')
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- filter start -->
    {{-- Update filter code --}}

    <div class="filter-field absolute top-full -right-4 z-30 mt-2 hidden px-4">
        <div
            class="rounded-xl overflow-hidden w-82 customScroll customScrollY flex h-[400px] flex-col overflow-y-scroll dark:bg-dark_1 bg-white shadow-lara-shadow2 sm:w-96 2xl:h-[550px] 2xl:w-[500px]">
            <h2
                class="font-16 border-b border-black-30 border-opacity-40 p-4 font-medium capitalize dark:text-white text-dark_1 2xl:p-6">
                {{ __('Filter Options') }}
            </h2>
            <div class="flex-1 p-4 2xl:p-6">
                <form class="h-full" action="{{ $data->path() }}" method="get"
                    id="{{ 'lf-' . $data->getPageName() . '-fltr' }}">
                    <div class="flex h-full flex-col justify-between">
                        <div class="row">
                            @if ($data->showDateFilter)
                                <div class="mt-3 w-full px-4">
                                    <label class="lara-label" for="filter-start-date">{{ __('Start Date') }}</label>
                                    <div class="defaultcal relative">
                                        <div class="defaultcal relative">
                                            <input id="filter-start-date"
                                                class="lara-input-date"
                                                type="date" name="{{ $data->getPageName() }}-frm"
                                                value="{{ get_query_param($data->getPageName() . '-frm') }}">
                                            <div
                                                class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 dark:text-white text-dark_1 2xl:right-[27px]">
                                                @svg('heroicon-o-calendar-days', '2xl:w-5 w-4 text-gray-300')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 w-full px-4">
                                    <label class="lara-label" for="filter-end-date">{{ __('End Date') }}</label>
                                    <div class="relative">
                                        <input id="filter-end-date"
                                            class="lara-input-date"
                                            type="date" name="{{ $data->getPageName() }}-to"
                                            value="{{ get_query_param($data->getPageName() . '-to') }}">
                                        <div
                                            class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 dark:text-white text-dark_1 2xl:right-[27px]">
                                            @svg('heroicon-o-calendar-days', '2xl:w-5 w-4 text-gray-300')
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @foreach ($data->datatableFields as $fieldProperties)
                                @if ($fieldProperties['filterable'])
                                    <div class="mt-4 w-1/2 px-4">
                                        <span
                                            class="font-16 font-medium capitalize lara-label">{{ $fieldProperties['label'] }}</span>
                                        @foreach ($fieldProperties['filter_data'] as $optionValue => $optionLabel)
                                            <div class="flex items-center">
                                                <label
                                                    class="custom-input-checked flex cursor-pointer items-center justify-center rounded ">
                                                    <input class="approve custom-check hidden appearance-none"
                                                        type="checkbox"
                                                        id="{{ $data->getPageName() }}-fltr-{{ $fieldProperties['field_name'] }}-{{ $optionValue }}"
                                                        name="{{ $data->getPageName() }}-fltr[{{ $fieldProperties['field_name'] }}][]"
                                                        value="{{ $optionValue }}"
                                                        {{ is_array(request()->input($data->getPageName() . '-fltr.' . $fieldProperties['field_name'])) && in_array($optionValue, request()->input($data->getPageName() . '-fltr.' . $fieldProperties['field_name'])) ? 'checked' : '' }}>
                                                    <svg class="checked-item h-5 w-5 rounded border-2 border-gray-400 dark:border-lara-gray text-transparent"
                                                        viewBox="0 0 172 172">
                                                        <g fill="none" font-family="none" font-size="none"
                                                            font-weight="none" stroke-miterlimit="10"
                                                            stroke-width="none" style="mix-blend-mode:normal"
                                                            text-anchor="none">
                                                            <path d="M0 172V0h172v172z"></path>
                                                            <path
                                                                d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                                                fill="currentColor" stroke-width="1"></path>
                                                        </g>
                                                    </svg>
                                                    <span
                                                        class="ml-3 capitalize dark:text-optm-gray-200 lara-label font-12 mt-2">{{ $optionLabel }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @if (request()->input($data->getPageName() . '-srch'))
                            <input type="hidden" name="{{ $data->getPageName() }}-srch"
                                value="{{ request()->input($data->getPageName() . '-srch') }}">
                        @endif

                        @if ($data->pageOptions['show_per_page_options'] && request()->has($data->getPageName() . '-per-page'))
                            <input type="hidden" name="{{ $data->getPageName() }}-per-page"
                                value="{{ $data->pageOptions['per_page'] }}">
                        @endif


                        @if ($data->searchOptions['show_searchable_columns'])
                            <input class="search-hidden-input-1" type="hidden"
                                name="{{ $data->getPageName() }}-srch-field"
                                value="{{ request()->query($data->getPageName() . '-srch-field') }}">
                        @endif

                        @if ($data->searchOptions['show_search_conditions'])
                            <input class="search-hidden-input-2" type="hidden"
                                name="{{ $data->getPageName() }}-srch-cond"
                                value="{{ request()->query($data->getPageName() . '-srch-cond', 'similar') }}">
                        @endif

                        <!-- button start -->
                        <div class="w-full">
                            <div class="row -mx-2">
                                <div class="mt-4 w-full px-2 sm:w-1/2">
                                    <button type="reset"
                                        class="lara-cancel-btn w-full">{{ __('Reset') }}</button>
                                </div>
                                <div class="mt-4 w-full px-2 sm:w-1/2">
                                    <button type="submit"
                                        class="lara-secondary-btn w-full">{{ __('Filter') }}</button>
                                </div>
                            </div>
                        </div>
                        <!-- button end -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- filter end -->

</div>
