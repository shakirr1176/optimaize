<div class="shadow-layer"></div>
<div class="bg-white dark:bg-lara-primary rounded-br-[36px] z-50">
    <div
    {{ $attributes->merge(['class' => 'flex flex-col justify-between bg-white dark:bg-lara-gray-100 duration-300 z-50 customScroll-none rounded-tr-[36px]']) }}>
    <div class="h-full">
            <div class="sticky top-0 z-50 bg-white dark:bg-lara-primary">
                <div
            class="duration-300 bg-white dark:bg-lara-gray-100 flex h-[80px] items-center justify-center text-sm font-bold text-white 2xl:h-[100px] rounded-tr-[36px]">
                <a class="flex justify-center" href="{{ url('/') }}">
                    <img class="menu-logo pl-6 2xl:pl-0 pr-12 w-[250px]" src="{{ get_logo_url() }}" alt="">
                    <img class="menu-logo w-10" src="{{ get_logo_small_url() }}" alt="">
                </a>
                </div>
            </div>
            <div class="root-item drop-down-item pb-4 duration-300 2xl:pb-6">
                <x-sidebar.ul>
                    @each('components.sidebar.nested', $list, 'menu')
                </x-sidebar.ul>
            </div>
        </div>

        <div class="sticky bottom-[0.5px] bg-light-body dark:bg-lara-primary">
            <div class="calendar-sec duration-300 bg-white dark:bg-lara-gray-100 rounded-br-[36px] text-lara-gray-200 dark:text-white">
                <div class="calendar-sec-div duration-300 py-4 bg-light-body dark:bg-lara-primary rounded-[16px]">
                    <div class="clock">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="block sidebar-time font-14 font-bold"></span>
                    </div>
                    <div class="text-right mb-1">
                        <span class="sidebar-day font-semibold font-18 pl-4"></span>
                        <span class="sidebar-date font-14 text-xs block"></span>
                    </div>
                </div>

                <div class="text-lara-gray-200 footer pt-6">
                    {{ __('All Right Reserved Powered by') }} <span class="text-lara-orange font-medium">codemen</span>
                </div>
            </div>
        </div>
    </div>
</div>
