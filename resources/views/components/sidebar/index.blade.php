<div class="shadow-layer"></div>
<div class="bg-optm-gray-200 dark:bg-lara-primary z-50">
    <div
    {{ $attributes->merge(['class' => 'flex flex-col justify-between bg-optm-gray-200 dark:bg-lara-gray-100 duration-300 z-50 customScroll-none']) }}>
    <div class="h-full">
            <div class="pt-14 sticky top-0 z-50 bg-optm-gray-200 dark:bg-lara-primary">
                <div class="text-center">
                    <button id="sidebar-collapse-button">
                        <svg class="w-4 2xl:w-5 mx-auto" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="2.00152e-07" y1="16.5" x2="20" y2="16.5" stroke="#10122B" stroke-width="3"/>
                            <line x1="2.23158e-07" y1="9" x2="20" y2="9" stroke="#10122B" stroke-width="3"/>
                            <line x1="2.23158e-07" y1="1.5" x2="13.3333" y2="1.5" stroke="#10122B" stroke-width="3"/>
                            </svg>
                    </button>
                </div>
                <div
            class=" duration-300 bg-optm-gray-200 dark:bg-lara-gray-100 flex h-[75px] items-center justify-center text-sm font-bold text-white 2xl:h-[80px]">
                <a class="flex justify-center" href="{{ url('/') }}">
                    <img class="menu-logo pl-6 2xl:pl-0 pr-12 w-[250px]" src="{{ get_logo_url() }}" alt="">
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

        <div class="sticky bottom-[0.5px] dark:bg-lara-primary">
            
        </div>
    </div>
</div>
