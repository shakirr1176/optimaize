@props(['data', 'rowData'])

<div class="flex items-center justify-end gap-2">
    @foreach ($data->actionLinks as $link)
        @if (!has_permission($link['route_name']))
            @continue
        @endif

        @if (!empty($link['conditions']) && !isLinkShowable($item, $link['conditions']))
            @continue
        @endif
        @php
            $actionRouteParams = $rowData->{$link['primary_key']};
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
                            $actionParamRelationship = optional($rowData->{$actionParamNames[$i]});
                        }
                    }
                    $actionRouteParams = $actionParamRelationship->{$actionParamNames[$actionParamCount -1]};
                }else {
                    $actionRouteParams = $rowData->{$actionParamNames[0]};
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
                                $actionParamRelationship = optional($rowData->{$actionParamNames[$i]});
                            }
                        }
                        $actionRouteParams[$paramKey] = $actionParamRelationship->{$actionParamNames[$actionParamCount -1]};
                    }else {
                        $actionRouteParams[$paramKey] = $rowData->{$actionParamNames[0]};
                    }
                }
            }
        @endphp

        @if ($link['confirmation'])
            <a class="confirmation relative group {{ $link['link_class'] }} relative group w-8 h-8 duration-300 flex items-center justify-center capitalize rounded-full text-white"
                href="{{ route($link['route_name'], $actionRouteParams) }}"
                target="{{ $link['target'] }}"
                data-form-id="{{ $rowData->{$link['primary_key']} }}"
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
            <a class="{{ $link['link_class'] }} relative group w-8 h-8 duration-300 flex items-center justify-center capitalize rounded-full text-white"
                href="{{ route($link['route_name'], $actionRouteParams) }}"
                target="{{ $link['target'] }}"
                data-form-id="{{ $rowData->{$link['primary_key']} }}">
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
</div>
