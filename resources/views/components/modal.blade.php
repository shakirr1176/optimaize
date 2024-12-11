<div
    {{ $attributes->merge(['class' => 'w-full px-6 hidden bg-black absolute top-0 left-0 z-50 h-screen bg-opacity-30']) }}>
    <form id="modalForm" class="h-full py-10 flex items-center justify-center modalForm">
        <div class="dark:bg-lara-darkBlack bg-white w-full sm:w-7/12 md:w-1/2 xl:w-5/12 mx-auto relative rounded-xl">
            <div class=" dark:bg-lara-primary bg-light-body py-4 2xl:py-6 px-6 2xl:px-8 font-20 font-semibold rounded-t-xl">
                <p class="dark:text-white text-lara-whiteGray capitalize">{{ $title }}</p>
                <button type="button" class="absolute -top-2 -right-2 w-6 h-6 border-2 text-white border-white bg-danger rounded-full flex items-center justify-center closeButton">
                    @svg('heroicon-s-x-mark', 'w-4 pointer-events-none')
                </button>
            </div>
            <div class="p-6 2xl:p-8 max-h-[calc(100vh-200px)] overflow-y-scroll customScroll">
                <div class="row">
                    {{ $inputs }}
                </div>
                <div class="mt-6 2xl:mt-8 w-full lg:w-1/2">
                    <div class="row -mx-2">
                        <div class="px-2 w-full sm:w-1/2">
                            <x-forms.button class="w-full bg-danger font-16 font-semibold" type="reset">
                                {{ __('Reset') }}
                            </x-forms.button>
                        </div>
                        {{ $button }}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
