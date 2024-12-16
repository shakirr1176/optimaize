@props(['data'])

@isset($filter)
    {{ $filter }}
@else
    <x-datatable.filter>
        @if ($data->filterButtons)
            <x-slot name="buttons">
                @foreach ($data->filterButtons as $filterButton)
                    @if ($filterButton['has_permission'])
                        <a href="{{ $filterButton['url'] }}" class="{{ $filterButton['btn_class'] }} lara-btn">
                            {{ $filterButton['name'] }}
                        </a>
                    @endif
                @endforeach
            </x-slot>
        @endif
    </x-datatable.filter>
@endisset

<div class="w-full 2xl:mt-4">
    <div class="fixed top-1/2 left-1/2 z-40 table-edit-button-container inline-block">

    </div>
    <!-- table start -->
    <div class="{{ $slot->isEmpty() ? 'table-container' : '' }}">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <x-table.index>
                <x-slot name="thead">
                    <x-table.tr class="0">
                        {{-- <th></th> --}}
                        @foreach ($data->datatableFields as $fieldOptions)
                            @if ($fieldOptions['visibility'])
                                <x-table.th class="{{ $fieldOptions['label_class'] }}" :sortableColumn="$fieldOptions['sortable'] ? $fieldOptions['field_name'] : ''">
                                    {{ $fieldOptions['label'] }}</x-table.th>
                            @endif
                        @endforeach
                        @if (!empty($data->actionLinks))
                            <x-table.th-action>{{ __('Action') }}</x-table.th-action>
                        @endif
                    </x-table.tr>
                </x-slot>

                @forelse($data as $item)
                    <x-table.tr class="font-14 font-medium">
                        {{-- <td class="bg-light-table-row dark:bg-dark_1 w-10">
                            <div class="w-10">
                                <button class="tableDropBtn w-4 h-4 2xl:w-5 2xl:h-5 mx-auto block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto  text-lara-blue">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden text-danger">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                      </svg>
                                </button>
                            </div>
                            <div class="hidder-column hidden">
                                <ul class="px-6 py-2 flex flex-wrap font-14">
                                    <li class="pr-6">
                                        <span class="capitalize font-semibold pr-2 text-black-50">Header1 :</span>
                                        <span class="capitalize"> data</span>
                                    </li>
                                    <li class="pr-6">
                                        <span class="capitalize font-semibold pr-2 text-black-50">Header1 :</span>
                                        <span class="capitalize"> data</span>
                                    </li>
                                    <li class="pr-6">
                                        <span class="capitalize font-semibold pr-2 text-black-50">Header1 :</span>
                                        <span class="capitalize"> data</span>
                                    </li>
                                    <li class="pr-6">
                                        <span class="capitalize font-semibold pr-2 text-black-50">Header1 :</span>
                                        <span class="capitalize"> data</span>
                                    </li>
                                </ul>
                            </div>
                        </td> --}}

                        @foreach ($data->datatableFields as $fieldOptions)
                            @if ($fieldOptions['visibility'])

                                <x-table.td class="{{ $fieldOptions['data_class'] }}">
                                    @php
                                        // code need to optimize
                                        $funcParams = [];
                                        if (!empty($fieldOptions['display_callable_function']['extra_params'])) {
                                            foreach ($fieldOptions['display_callable_function']['extra_params'] as $param) {
                                                $paramNames = explode('.', $param);
                                                $paramCount = count($paramNames);
                                                if ($paramCount > 1) {
                                                    $paramRelationship = null;
                                                    for ($i = 0; $i < ($paramCount -1); $i++) {
                                                        if (!empty($paramRelationship)) {
                                                            $paramRelationship = optional($paramRelationship->{$paramNames[$i]});
                                                        }else {
                                                            $paramRelationship = optional($item->{$paramNames[$i]});
                                                        }
                                                    }
                                                    $funcParams[] = $paramRelationship->{$paramNames[$paramCount -1]};
                                                }else {
                                                    $funcParams[] = $item->{$paramNames[0]};
                                                }
                                            }
                                        }

                                        $routeParams = $item->{$fieldOptions['link_data']['primary_key']};
                                        $linkRouteParams = $fieldOptions['link_data']['route_params'];
                                        $linkRouteParamsCount = count($linkRouteParams);
                                        $paramRelationship = null;
                                        if ($linkRouteParamsCount == 1) {
                                            $routeParams = null;
                                            $paramValue = current($linkRouteParams);
                                            $paramNames = explode('.', $paramValue);
                                            $paramCount = count($paramNames);
                                            if ($paramCount > 1) {
                                                $paramRelationship = null;
                                                for ($i = 0; $i < ($paramCount -1); $i++) {
                                                    if (!empty($paramRelationship)) {
                                                        $paramRelationship = optional($paramRelationship->{$paramNames[$i]});
                                                    }else {
                                                        $paramRelationship = optional($item->{$paramNames[$i]});
                                                    }
                                                }
                                                $routeParams = $paramRelationship->{$paramNames[$paramCount -1]};
                                            }else {
                                                $routeParams = $item->{$paramNames[0]};
                                            }
                                        }
                                        elseif ($linkRouteParamsCount > 1) {
                                            $routeParams = [];
                                            foreach ($linkRouteParams as $paramKey => $paramValue) {
                                                $paramNames = explode('.',$paramValue);
                                                $paramCount = count($paramNames);
                                                if ($paramCount > 1) {
                                                    $paramRelationship = null;
                                                    for ($i = 0; $i < ($paramCount -1); $i++) {
                                                        if (!empty($paramRelationship)) {
                                                            $paramRelationship = optional($paramRelationship->{$paramNames[$i]});
                                                        }else {
                                                            $paramRelationship = optional($item->{$paramNames[$i]});
                                                        }
                                                    }
                                                    $routeParams[$paramKey] = $paramRelationship->{$paramNames[$paramCount -1]};
                                                }else {
                                                    $routeParams[$paramKey] = $item->{$paramNames[0]};
                                                }
                                            }
                                        }

                                    @endphp
                                    @if (!empty($fieldOptions['relation_name']))
                                        @php
                                            $relationship = null;
                                            foreach ($fieldOptions['relation_name'] as $relationName) {
                                                if (!empty($relationship)) {
                                                    $relationship = optional($relationship->{$relationName});
                                                }else {
                                                    $relationship = optional($item->{$relationName});
                                                }
                                            }
                                        @endphp
                                        @if ($fieldOptions['display_callable_function']['name'])
                                            {{ call_user_func_array($fieldOptions['display_callable_function']['name'], [$relationship->{$fieldOptions['field_name']}, ...$funcParams]) }}
                                        @elseif($fieldOptions['linkable'] && !is_null($routeParams))
                                            <a class="font-medium text-primary hover:underline"
                                                target="{{ $fieldOptions['link_data']['target'] }}"
                                                href="{{ route($fieldOptions['link_data']['route_name'], $routeParams) }}">{{ $relationship->{$fieldOptions['field_name']} }}</a>
                                        @else
                                            {{ $relationship->{$fieldOptions['field_name']} }}
                                        @endif
                                    @else
                                        @if ($fieldOptions['display_callable_function']['name'])
                                            {{ call_user_func_array($fieldOptions['display_callable_function']['name'], [$item->{$fieldOptions['field_name']}, ...$funcParams]) }}
                                        @elseif($fieldOptions['linkable'] && !is_null($routeParams))
                                            <a class="font-medium text-primary hover:underline"
                                                target="{{ $fieldOptions['link_data']['target'] }}"
                                                href="{{ route($fieldOptions['link_data']['route_name'], $routeParams) }}">{{ $item->{$fieldOptions['field_name']} }}</a>
                                        @else
                                            {{ $item->{$fieldOptions['field_name']} }}
                                        @endif
                                    @endif
                                </x-table.td>
                            @endif
                        @endforeach

                        @if (!empty($data->actionLinks))

                            <x-table.td-action>
                                <x-datatable.actions :data="$data" :rowData="$item"></x-datatable.actions>
                                {{-- <div class="flex items-center justify-end">
                                    @foreach ($data->actionLinks as $link)
                                        @if (!has_permission($link['route_name']))
                                            @continue
                                        @endif

                                        @if (!empty($link['conditions']) && !isLinkShowable($item, $link['conditions']))
                                            @continue
                                        @endif
                                        @php
                                            $actionRouteParams = $item->{$link['primary_key']};
                                            $actionLinkRouteParams = $link['route_params'];
                                            $actionLinkRouteParamsCount = count($actionLinkRouteParams);
                                            $actionParamRelationship = null;
                                            if ($actionLinkRouteParamsCount == 1) {
                                                $actionRouteParams = null;
                                                $actionParamValue = current($actionLinkRouteParams);
                                                $actionParamNames = explode('.', $actionParamValue);
                                                $actionParamCount = count($actionParamNames);
                                                if ($actionParamCount > 1) {
                                                    $actionParamRelationship = null;
                                                    for ($i = 0; $i < ($actionParamCount -1); $i++) {
                                                        if (!empty($actionParamRelationship)) {
                                                            $actionParamRelationship = optional($actionParamRelationship->{$actionParamNames[$i]});
                                                        }else {
                                                            $actionParamRelationship = optional($item->{$actionParamNames[$i]});
                                                        }
                                                    }
                                                    $actionRouteParams = $actionParamRelationship->{$actionParamNames[$actionParamCount -1]};
                                                }else {
                                                    $actionRouteParams = $item->{$actionParamNames[0]};
                                                }
                                            }
                                            elseif ($actionLinkRouteParamsCount > 1) {
                                                $actionRouteParams = [];
                                                foreach ($actionLinkRouteParams as $paramKey => $actionParamValue) {
                                                    $actionParamNames = explode('.',$actionParamValue);
                                                    $actionParamCount = count($actionParamNames);
                                                    if ($actionParamCount > 1) {
                                                        $actionParamRelationship = null;
                                                        for ($i = 0; $i < ($actionParamCount -1); $i++) {
                                                            if (!empty($actionParamRelationship)) {
                                                                $actionParamRelationship = optional($actionParamRelationship->{$actionParamNames[$i]});
                                                            }else {
                                                                $actionParamRelationship = optional($item->{$actionParamNames[$i]});
                                                            }
                                                        }
                                                        $actionRouteParams[$paramKey] = $actionParamRelationship->{$actionParamNames[$actionParamCount -1]};
                                                    }else {
                                                        $actionRouteParams[$paramKey] = $item->{$actionParamNames[0]};
                                                    }
                                                }
                                            }
                                        @endphp

                                        @if ($link['confirmation'])
                                            <a class="confirmation relative group {{ $link['link_class'] }} flex items-center space-x-1.5 rounded-md w-[30px] h-[30px] justify-center capitalize text-white  ml-1"
                                                href="{{ route($link['route_name'], $actionRouteParams) }}"
                                                target="{{ $link['target'] }}"
                                                data-form-id="{{ $item->{$link['primary_key']} }}"
                                                data-alert="{{ $link['confirmation_data']['title'] }}"
                                                data-form-method="{{ $link['confirmation_data']['method'] }}">
                                                @svg($link['name'], 'w-4 pointer-events-none')

                                                @if ($link['tooltip'])
                                                    <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                        <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{  $link['tooltip'] }}</span>
                                                        <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                    </span>
                                                @endif

                                            </a>
                                        @else
                                            <a class="{{ $link['link_class'] }} relative group flex items-center space-x-2 rounded-md w-[30px] h-[30px] justify-center capitalize dark:text-white text-lara-gray-400 ml-1"
                                                href="{{ route($link['route_name'], $actionRouteParams) }}"
                                                target="{{ $link['target'] }}"
                                                data-form-id="{{ $item->{$link['primary_key']} }}">
                                                @svg($link['name'], 'w-4 pointer-events-none')

                                                @if ($link['tooltip'])
                                                    <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                        <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{  $link['tooltip'] }}</span>
                                                        <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                    </span>
                                                @endif
                                            </a>
                                        @endif
                                    @endforeach
                                </div> --}}
                            </x-table.td-action>
                        @endif
                    </x-table.tr>
                @empty
                    <x-table.tr class="font-14 mt-4 font-medium">
                        @php
                            $cols = count(
                                array_filter($data->datatableFields, function ($field) {
                                    return $field['visibility'] === true;
                                }),
                            );
                            if (!empty($data->actionLinks)) {
                                $cols += 1;
                            }
                        @endphp
                        <x-table.td colspan="{{ $cols+1 }}" class="text-center py-2.5" style="border-radius: 16px">
                            {{ __('No data was found!') }}
                        </x-table.td>
                    </x-table.tr>
                @endforelse
            </x-table.index>
        @endif
    </div>
    <!-- table end -->
</div>

<x-datatable.pagination :paginationData="$data"></x-datatable.pagination>
