@props(['paginationData'])

@php
    $pagcountst = ($paginationData->currentPage() - 1) * $paginationData->perPage() + 1;
    $pagcountnd = ($paginationData->currentPage() - 1) * $paginationData->perPage() + $paginationData->count();
    $currentItem = '';
    if ($pagcountnd === 0 || $pagcountst > $pagcountnd) {
        $current = '0';
    } elseif ($pagcountst === $pagcountnd) {
        $current = $pagcountnd;
        $currentItem = __('no.') . ' ';
    } else {
        $current = $pagcountst . ' - ' . $pagcountnd;
    }

    $leftRightPageLinks = $paginationData->onEachSide;
    if ($leftRightPageLinks < 1) {
        $leftRightPageLinks = 1;
    }

    $numberOfShowablePageLinks = $leftRightPageLinks * 2 + 1;

    $minimumPageNumberToShowFirstLink = ($numberOfShowablePageLinks + 1) / 2 + 1;
    $minimumPageNumberToShowLastLink = $paginationData->lastPage() - ($numberOfShowablePageLinks + 1) / 2;
    if ($paginationData->lastPage() < $numberOfShowablePageLinks) {
        $pages = range(1, $paginationData->lastPage());
    } elseif ($paginationData->lastPage() === $numberOfShowablePageLinks) {
        $pages = range(1, $numberOfShowablePageLinks);
    } elseif (!($paginationData->lastPage() > $numberOfShowablePageLinks && $paginationData->currentPage() >= $minimumPageNumberToShowFirstLink) || !($paginationData->lastPage() > $numberOfShowablePageLinks && $paginationData->currentPage() <= $minimumPageNumberToShowLastLink)) {
        $pages = range($paginationData->currentPage() - $numberOfShowablePageLinks, $paginationData->currentPage() + $numberOfShowablePageLinks);
        $pages = array_values(
            array_filter($pages, static function ($value) use ($paginationData) {
                return $value >= 1 && $value <= $paginationData->lastPage();
            }),
        );
        if (!($paginationData->lastPage() > $numberOfShowablePageLinks && $paginationData->currentPage() >= $minimumPageNumberToShowFirstLink)) {
            $pages = array_slice($pages, 0, $numberOfShowablePageLinks + 1);
        } elseif (!($paginationData->lastPage() > $numberOfShowablePageLinks && $paginationData->currentPage() <= $minimumPageNumberToShowLastLink)) {
            $pages = array_slice($pages, count($pages) - $numberOfShowablePageLinks - 1);
        }
    } else {
        $pages = range($paginationData->currentPage() - $leftRightPageLinks, $paginationData->currentPage() + $leftRightPageLinks);
        $pages = array_filter($pages, static function ($value) use ($paginationData) {
            return $value >= 1 && $value <= $paginationData->lastPage();
        });
    }
@endphp

<div class="mt-6 flex flex-wrap items-center">
    <div class="w-full md:w-1/2">
        <p class="font-14 text-center text-dark_2 dark:text-branco-sujo md:text-left rounded-lara-radious block">
            {{ __('Showing: :currentItem :current of :total data', ['currentItem' => $currentItem, 'current' => $current, 'total' => $paginationData->total()]) }}
        </p>
    </div>
    <div class="mt-5 w-full md:mt-0 md:w-1/2">
        <ul class="flex items-center justify-center space-x-1.5 md:justify-end">
            @if ($paginationData->onFirstPage())
                <li>
                    <span
                    class="font-18 flex h-9 w-9 rounded-lara-radious cursor-not-allowed items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white">
                    @svg('heroicon-s-chevron-double-left','h-2 w-2')
                </span>
                </li>
                <li>
                    <span
                        class="rounded-lara-radious font-14 flex h-9 w-9 cursor-not-allowed items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white px-3"> @svg('heroicon-s-chevron-left', 'h-2.5 w-2.5') </span>
                </li>
            @else
                <li>
                    <a class="font-14 flex h-9 w-9 rounded-lara-radious items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white duration-300 hover:bg-optm-purple hover:text-white"
                        href="{{ $paginationData->url(1) }}">@svg('heroicon-s-chevron-double-left','h-2 w-2')</a>
                </li>
                <li>
                    <a class="font-14 flex h-9 w-9 rounded-lara-radious items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white px-3 duration-300 hover:bg-optm-purple hover:text-white"
                        href="{{ $paginationData->previousPageUrl() }}">
                        @svg('heroicon-s-chevron-left','h-2.5 w-2.5')
                    </a>
                </li>
            @endif
            @foreach ($pages as $i)
                @if ($i === $paginationData->currentPage())
                    <li>
                        <span
                            class="font-14 dark:bg-optm-purple bg-optm-purple flex h-9 w-9 rounded-lara-radious items-center justify-center bg-lara-orange text-white duration-300">{{ $i }}</span>
                    </li>
                @else
                    <li>
                        <a class="font-14 flex h-9 w-9 rounded-lara-radious items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white duration-300 hover:bg-optm-purple hover:text-white"
                            href="{{ $paginationData->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endforeach
            @if ($paginationData->hasMorePages())
                <li>
                    <a class="rounded-lara-radious font-14 flex h-9 w-auto items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white px-3 duration-300 hover:bg-optm-purple hover:text-white"
                        href="{{ $paginationData->nextPageUrl() }}">
                        @svg('heroicon-s-chevron-right','h-2.5 w-2.5')
                    </a>
                </li>
                <li>
                    <a class="font-14 flex h-9 w-9 rounded-lara-radious items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white duration-300 hover:bg-optm-purple hover:text-white"
                        href="{{ $paginationData->url($paginationData->lastPage()) }}">@svg('heroicon-s-chevron-double-right','h-2 w-2')</a>
                </li>
            @else
                <li>
                    <span
                    class="font-14 flex h-9 w-9 rounded-lara-radious cursor-not-allowed items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white px-3">
                    @svg('heroicon-s-chevron-right','h-2.5 w-2.5')
                </span>
                </li>
                <li>
                    <span
                    class="font-18 flex h-9 w-9 rounded-lara-radious cursor-not-allowed items-center justify-center dark:bg-dark-optm-gray-300 bg-white dark:text-white">@svg('heroicon-s-chevron-double-right','h-2 w-2')</span>
                </li>
            @endif
        </ul>
    </div>
</div>
