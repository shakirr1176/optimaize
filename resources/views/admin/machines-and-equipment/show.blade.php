<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('admin.machines-and-equipment.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="rounded-2xl bg-[#25284D0D] overflow-hidden">
        <div id="show-2-tab" class="flex flex-wrap font-16 font-semibold">
            <button class="tabButton active duration-300 flex-1 min-w-[200px]">Information</button>
            <button class="tabButton duration-300 flex-1 min-w-[200px]">Operations and Operators</button>
            <button class="tabButton duration-300 flex-1 min-w-[200px]">Machine Groups and Routes</button>
        </div>
        <div class="p-6">
            <div id="show-2-tab-content">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/4 upload-image-parent px-6 flex ">
                        <div
                            class="shadow-lara-shadow3 mx-auto xl:mx-0 w-40 h-40 2xl:w-44 2xl:h-44 rounded-full  justify-center items-center dark:bg-lara-gray-100/50 bg-gray-200">
                            <div
                                class="dark:bg-lara-gray-100 bg-gray-300 w-full h-full 2xl:w-48 2xl:h-48 rounded-full border-2 border-white border-none relative group">
                                <div class="w-full h-full flex-col flex items-center justify-center text-center">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_198_3877)">
                                            <path
                                                d="M24.5417 6.45833V24.5417H6.45833V6.45833H24.5417ZM24.5417 3.875H6.45833C5.0375 3.875 3.875 5.0375 3.875 6.45833V24.5417C3.875 25.9625 5.0375 27.125 6.45833 27.125H24.5417C25.9625 27.125 27.125 25.9625 27.125 24.5417V6.45833C27.125 5.0375 25.9625 3.875 24.5417 3.875ZM18.2642 15.3192L14.3892 20.3179L11.625 16.9725L7.75 21.9583H23.25L18.2642 15.3192Z"
                                                fill="#25284D" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_198_3877">
                                                <rect width="31" height="31" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="text-xs">image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-3/4">
                        <div class="tab">
                            <h2 class="font-18 text-dark_1 mb-3 font-semibold">{{ __('Machines and Equipment Info') }}
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div>
                                    <label class="lara-label-sm">Machine Name</label>
                                    <p class="font-16 text-dark_2 font-medium">Laser Cutter Pro 5000</p>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Machine Type</label>
                                    <p class="font-16 text-dark_2 font-medium">Cutting Machine</p>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Acquisition Date</label>
                                    <p class="font-16 text-dark_2 font-medium">2020-03-15</p>

                                </div>
                                <div>
                                    <label class="lara-label-sm">Production Capacity (per hour)</label>
                                    <div class="font-16 text-dark_2 font-medium">50 units</div>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Operating Cost (per hour)</label>
                                    <div class="font-16 text-dark_2 font-medium">20€</div>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Shifts</label>
                                    <div class="font-16 text-dark_2 font-medium">Morning, Evening</div>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Sector</label>
                                    <div class="font-16 text-dark_2 font-medium">Sector A</div>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Status</label>
                                    <div class="tag-btn bg-success/50">Active</div>
                                </div>
                                <div>
                                    <label class="lara-label-sm">Maintenance Schedule</label>
                                    <div class="font-16 text-dark_2 font-medium">Monthly</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab h-full">
                            <span class="show-no-data">{{ __('No data') }}</span>
                        </div>
                        <div class="tab h-full">
                            <span class="show-no-data">{{ __('No data') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('tab.js') }}"></script>
        <script>
            tabFunc('show-2-tab');
        </script>
    </x-section>
</x-app-layout>
