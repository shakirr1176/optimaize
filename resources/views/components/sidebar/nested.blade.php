@if (empty($menu['children']))
    <x-sidebar.li>
        @if ($menu['icon'])
            <a href="{{ $menu['url'] }}" title="{{ $menu['title'] }}"
            class="drop-down-header {{ $menu['active'] ? 'active-menu active-on' : '' }} mt-1 flex items-center justify-between px-6 py-2.5 2xl:py-3 font-light capitalize text-dark_2 dark:text-white duration-200">
                <span class="flex items-center font-medium">
                    <span class="menu-icon flex flex-shrink-0 items-center justify-center">
                        @svg($menu['icon'], 'w-full')
                    </span>
                    <span
                        class="menu-title font-14 inline w-32 xl:w-40 2xl:w-48 overflow-hidden text-ellipsis whitespace-nowrap px-3">{{ __($menu['title']) }}</span>
                </span>
            </a>
        @else
        <span class="block curve-svg w-2.5 h-0.5 absolute top-5 -translate-y-1/2 -left-0.5">
            </span>
            <a href="{{ $menu['url'] }}" title="{{ __($menu['title']) }}"
            class="drop-down-header {{ $menu['active'] ? 'active-menu active-on' : '' }} group-[.expand-sidebar]:ml-3.5 mt-1 flex items-center !justify-between py-2.5 2xl:py-3 pl-3 pr-18px font-light capitalize text-dark_2 dark:text-white duration-200">
                <span
                    class="font-14 block w-32 xl:w-40 2xl:w-44 items-center overflow-hidden text-ellipsis whitespace-nowrap pr-2">
                    {{ __($menu['title']) }}
                </span>
            </a>
        @endif

    </x-sidebar.li>
@else
    <x-sidebar.li>
        @if ($menu['icon'])
            <a href="javascript:" title="{{ __($menu['title']) }}"
                class="drop-down-header main-header mt-1 flex items-center px-6 py-2.5 2xl:py-3 font-light capitalize text-dark_2 dark:text-white duration-200">
                <span class="flex items-center font-medium">
                    <span class="menu-icon flex flex-shrink-0 items-center justify-center">
                        @svg($menu['icon'], 'w-full')
                    </span>
                    <span
                        class="menu-title font-14 inline w-32 xl:w-40 2xl:w-48 overflow-hidden text-ellipsis whitespace-nowrap px-3">{{ __($menu['title']) }}</span>
                </span>
                <svg class="menu-arrow ml-auto flex-shrink-0 duration-300" width="7" height="11"
                    viewBox="0 0 7 11" fill="none">
                    <path
                        d="M6.66323 4.98326C6.73019 5.05022 6.76367 5.12723 6.76367 5.21429C6.76367 5.30134 6.73019 5.37835 6.66323 5.44531L1.98242 10.1261C1.91546 10.1931 1.83845 10.2266 1.7514 10.2266C1.66434 10.2266 1.58733 10.1931 1.52037 10.1261L1.01814 9.62388C0.951172 9.55692 0.91769 9.47991 0.91769 9.39286C0.91769 9.3058 0.951172 9.22879 1.01814 9.16183L4.96568 5.21429L1.01814 1.26674C0.951172 1.19978 0.91769 1.12277 0.91769 1.03571C0.91769 0.94866 0.951172 0.871651 1.01814 0.804688L1.52037 0.302455C1.58733 0.23549 1.66434 0.202008 1.7514 0.202008C1.83845 0.202008 1.91546 0.23549 1.98242 0.302455L6.66323 4.98326Z"
                        fill="currentColor" fill-opacity="0.8" />
                </svg>
            </a>
        @else
        <span class="block curve-svg w-2.5 h-0.5 absolute top-5 -translate-y-1/2 -left-0.5">
            </span>
            <a href="javascript:" title="{{ __($menu['title']) }}"
                class="drop-down-header group-[.expand-sidebar]:ml-3.5 mt-1 flex items-center justify-between py-2.5 2xl:py-3 pl-3 pr-18px font-light capitalize text-dark_2 dark:text-white duration-200">
                <span
                    class="font-14 block w-32 xl:w-40 2xl:w-44 items-center overflow-hidden text-ellipsis whitespace-nowrap pr-2">
                    {{ __($menu['title']) }}
                </span>
                <svg class="menu-arrow ml-auto flex-shrink-0 duration-300" width="7" height="11" viewBox="0 0 7 11"
                    fill="none">
                    <path
                        d="M6.66323 4.98326C6.73019 5.05022 6.76367 5.12723 6.76367 5.21429C6.76367 5.30134 6.73019 5.37835 6.66323 5.44531L1.98242 10.1261C1.91546 10.1931 1.83845 10.2266 1.7514 10.2266C1.66434 10.2266 1.58733 10.1931 1.52037 10.1261L1.01814 9.62388C0.951172 9.55692 0.91769 9.47991 0.91769 9.39286C0.91769 9.3058 0.951172 9.22879 1.01814 9.16183L4.96568 5.21429L1.01814 1.26674C0.951172 1.19978 0.91769 1.12277 0.91769 1.03571C0.91769 0.94866 0.951172 0.871651 1.01814 0.804688L1.52037 0.302455C1.58733 0.23549 1.66434 0.202008 1.7514 0.202008C1.83845 0.202008 1.91546 0.23549 1.98242 0.302455L6.66323 4.98326Z"
                        fill="currentColor" fill-opacity="0.8" />
                </svg>
            </a>
        @endif
        <div class="drop-down-item group-[.expand-sidebar]:ml-8 group-[.collapse-sidebar]:ml-4 overflow-hidden" data-collapse="false" style="height: 0px;">
            <x-sidebar.ul>
                @foreach ($menu['children'] as $menu)
                    @include('components.sidebar.nested', $menu)
                @endforeach
            </x-sidebar.ul>
        </div>
    </x-sidebar.li>
@endif
