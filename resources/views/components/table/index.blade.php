@props(['pageName'])
<div class="rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
    <table
        {{ $attributes->merge(['class' => 'responsive-table w-full whitespace-nowrap']) }}>
        @isset($thead)
            <thead class="text-dark_1 dark:text-branco-sujo">
                {{ $thead }}
            </thead>
        @endisset
        <tbody class="text-dark_2 dark:text-optm-gray-200 rounded-3xl">
            {{ $slot }}
        </tbody>
        @isset($tfoot)
            <tfoot>
                {{ $tfoot }}
            </tfoot>
        @endisset
    </table>
</div>
