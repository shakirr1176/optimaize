<div class="shadow-layer"></div>
<div class="bg-gray-50 dark:bg-lara-primary z-50">
    <div
        {{ $attributes->merge(['class' => 'flex flex-col justify-between bg-gray-50 dark:bg-lara-gray-100 duration-300 z-50 customScroll-none']) }}>
        <div class="h-full">
            <div class="pt-14 sticky top-0 z-50 bg-gray-50 dark:bg-lara-primary">
                <div class="text-center">
                    <button id="sidebar-collapse-button">
                        <svg class="expand-menu-icon w-4 2xl:w-5 mx-auto" viewBox="0 0 20 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="2.00152e-07" y1="16.5" x2="20" y2="16.5" stroke="#10122B"
                                stroke-width="3" />
                            <line x1="2.23158e-07" y1="9" x2="20" y2="9" stroke="#10122B"
                                stroke-width="3" />
                            <line x1="2.23158e-07" y1="1.5" x2="13.3333" y2="1.5" stroke="#10122B"
                                stroke-width="3" />
                        </svg>
                        @svg('heroicon-o-arrow-left', 'collapse-menu-icon w-5 2xl:w-6')
                    </button>
                </div>
                <div
                    class=" duration-300 dark:bg-lara-gray-100 flex h-[75px] items-center justify-center text-sm font-bold text-white 2xl:h-[80px]">
                    <a class="flex justify-center" href="{{ url('/') }}">
                        <img class="menu-logo 2xl:pl-0 h-5 w-fit" src="{{ get_logo_url() }}" alt="">
                        <img class="menu-logo w-5 2xl:w-6" src="{{ get_logo_small_url() }}" alt="">
                    </a>
                </div>
            </div>
            <div class="root-item drop-down-item pb-4 duration-300 2xl:pb-6">
                <x-sidebar.ul>
                    @each('components.sidebar.nested', $list, 'menu')
                </x-sidebar.ul>
            </div>
        </div>

        <ul
            class="text-dark_2 sticky bottom-[0.5px] bg-gray-50 dark:bg-lara-primary gap-4 2xl:gap-6 pb-10 2xl:pb-16 pt-4">
            <li class="relative">
                <a href="" title="user"
                    class="drop-down-header mt-1 flex items-center justify-between px-6 py-2 2xl:py-3 font-light capitalize text-dark_2 dark:text-white duration-200">
                    <span class="flex items-center font-medium">
                        <span class="menu-icon flex flex-shrink-0 items-center justify-center">
                            @svg('heroicon-o-user', 'w-full')

                        </span>
                        <span
                            class="menu-title font-14 inline w-32 xl:w-40 2xl:w-48 overflow-hidden text-ellipsis whitespace-nowrap px-3">User</span>
                    </span>
                </a>
            </li>
            <li class="relative">
                <a href="" title="settings"
                    class="drop-down-header mt-1 flex items-center justify-between px-6 py-2 2xl:py-3 font-light capitalize text-dark_2 dark:text-white duration-200">
                    <span class="flex items-center font-medium">
                        <span class="menu-icon flex flex-shrink-0 items-center justify-center">
                            @svg('heroicon-o-cog-8-tooth', 'w-full')

                        </span>
                        <span
                            class="menu-title font-14 inline w-32 xl:w-40 2xl:w-48 overflow-hidden text-ellipsis whitespace-nowrap px-3">Settings</span>
                    </span>
                </a>
            </li>
            <li class="relative">
                <a data-form-id="logout" data-form-method="POST" title="Logout" data-alert="{{ __('Are you sure?') }}"
                    href="{{ route('logout') }}"
                    class="drop-down-header confirmation mt-1 flex items-center justify-between px-6 py-2 2xl:py-3 font-light capitalize text-dark_2 dark:text-white duration-200">
                    <span class="flex items-center font-medium">
                        <span class="menu-icon flex flex-shrink-0 items-center justify-center">
                            @svg('heroicon-o-arrow-left-start-on-rectangle', 'w-full')

                        </span>
                        <span
                            class="menu-title font-14 inline w-32 xl:w-40 2xl:w-48 overflow-hidden text-ellipsis whitespace-nowrap px-3">{{ __('Logout') }}</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
