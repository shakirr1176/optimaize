<div class="w-full">
    <h1 class="font-bold font-34 my-8 2xl:my-10 capitalize">{{ $slot }}</h1>
    {{-- <ul class="mt-1.5 flex flex-wrap items-center">
        <li>
            <a class="capitalize text-lara-gray-400 dark:hover:text-white hover:text-lara-primary duration-300 flex items-center" href="{{ route('admin.dashboard') }}">
                @svg('heroicon-s-home', 'w-4 mr-2')
                <span class="pr-3 font-14">{{ __('Dashboard') }}</span>
            </a>
        </li>
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb['display_url'])
                @if ($breadcrumb['url'] == url()->current())
                    <li>
                        <span class="capitalize text-lara-gray9 flex items-center">
                            <span class="h-4 w-px inline-block bg-lara-gray-400 rotate-12"></span>
                            <span class="px-3 text-lara-gray-400 font-14">{{ $breadcrumb['name'] }}</span>
                        </span>
                    </li>
                @else
                    <li>
                        <a class="capitalize text-lara-gray9 flex items-center" href="{{ $breadcrumb['url'] }}">
                            <span class="h-4 w-px inline-block bg-lara-gray-400 rotate-12"></span>
                            <span class="px-3 text-lara-gray-400 font-14">{{ $breadcrumb['name'] }}</span>
                        </a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul> --}}
</div>
