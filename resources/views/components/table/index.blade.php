@props(['pageName'])
<div class="border dark:border-0 bg-white dark:bg-lara-darkBlack rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
    <table
        {{ $attributes->merge(['class' => 'responsive-table border-spacing-y-1.5 px-4 2xl:px-6 pb-6 border-separate w-full whitespace-nowrap']) }}>
        @isset($thead)
            <thead>
                {{ $thead }}
            </thead>
        @endisset
        <tbody class="text-lara-gray-400 dark:text-white rounded-3xl">
            {{ $slot }}
        </tbody>
        @isset($tfoot)
            <tfoot>
                {{ $tfoot }}
            </tfoot>
        @endisset
    </table>
</div>
