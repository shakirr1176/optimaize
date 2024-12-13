<div
    {{ $attributes->merge(['class' => 'w-full px-6 hidden bg-black fixed top-0 left-0 z-50 h-screen bg-opacity-50']) }}>
    <form id="modalForm" class="h-full py-10 flex items-center justify-center modalForm">
        <div class="dark:bg-lara-darkBlack bg-optm-gray-100 w-full sm:w-7/12 md:w-1/2 xl:w-5/12 mx-auto relative rounded-xl">
            <div class=" dark:bg-lara-primary py-4 2xl:py-6 px-6 2xl:px-8 font-20 font-semibold rounded-t-xl">
                <p class="text-dark_1 dark:text-white capitalize">{{ $title }}</p>
                {{-- <button type="button" class="absolute -top-2 -right-2 w-6 h-6 border-2 text-white border-white bg-danger rounded-full flex items-center justify-center closeButton">
                    @svg('heroicon-s-x-mark', 'w-4 pointer-events-none')
                </button> --}}
            </div>
            <div class="p-6 2xl:p-8 pt-0 max-h-[calc(100vh-200px)] overflow-y-scroll customScroll">

                <div class="grid grid-cols-12 gap-4">
                    {{ $inputs }}
                </div>

                <div class="grid grid-cols-2 gap-3 mt-4 pt-4 border-t border-gray-400">
                    <x-forms.button class="closeButton lara-cancel-btn" type="button">
                        @svg('heroicon-s-minus')
                        {{ __('Cancel') }}
                    </x-forms.button>
                    {{ $button }}
                </div>
            </div>
        </div>
    </form>
</div>
