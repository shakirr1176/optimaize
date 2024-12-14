<x-app-layout>
    <x-section name="title">{{ __('Components') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="#" class="mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>

            {{ __('Eurico Fertuzinhos') }}

            <x-slot name="below">
                <div class="flex justify-between">
                    <div class="text-dark_1 font-20 font-semibold">#RH-01</div>
                </div>
            </x-slot>

            <x-slot name="right">
                <div class="flex items-center gap-2">
                    <button class="action-btn">
                        @svg('heroicon-s-pencil', 'w-4')
                    </button>
                    <button class="action-btn bg-danger hover:bg-red-600">
                        <svg class="size-4" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                fill="#F2F2F2" />
                        </svg>
                    </button>
                </div>
            </x-slot>

        </x-breadcrumb>
    </x-section>
    <div class="component-page">
        <div class="">
            <div class="rounded-2xl bg-[#25284D0D] overflow-hidden">
                <div id="component-tab" class="flex font-16 font-semibold items-center">
                    <button class="active tabButton duration-300 flex-1 min-w-[200px]">Information</button>
                    <button class="tabButton duration-300 flex-1 min-w-[200px]">Hours and Vacation Map</button>
                    <button class="tabButton duration-300 flex-1 min-w-[200px]">Competencies</button>
                </div>
                <div class="p-6">
                    <div id="component-tab-content">
                        <div class="tab">
                            <div class="flex items-center justify-between gap-4">
                                <label class="font-18 font-semibold" for="">Operations and Task</label>
                                <button class="action-btn bg-opacity-10 text-dark_2">
                                    @svg('heroicon-s-plus', 'w-4')
                                </button>
                            </div>
                            <div
                                class="dark:bg-lara-darkBlack rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
                                <table class="responsive-table w-full whitespace-nowrap">
                                    <thead class="text-dark_1">
                                        <tr class="uppercase text-left whitespace-nowrap">
                                            <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                                                ID
                                            </th>

                                            {{-- customer name --}}
                                            <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4 ">

                                                Order date
                                            </th>

                                            {{-- created date --}}
                                            <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4 ">
                                                Order name
                                            </th>

                                            {{-- last updated --}}
                                            <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                                                Value
                                            </th>

                                            {{-- note --}}
                                            <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                                                Status
                                            </th>

                                            <th class="2xl:pt-3 pt-2.5 font-14 text-right font-medium pl-6 pr-2.5 ">
                                                <p>Action</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark_2">
                                        <tr class="text-left whitespace-nowrap font-14">

                                            <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                #O-00000001
                                            </td>

                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                2025-00-00
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                Order Name
                                            </td>

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                                                0000,00€
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                                    <span>Closed</span>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td
                                                class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                                                <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                                    <a href="" class="action-btn relative group">
                                                        <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Show') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="action-btn relative group bg-danger hover:bg-red-600">
                                                        <svg class="size-4" viewBox="0 0 12 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                                                fill="#F2F2F2" />
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Delete') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap font-14">

                                            <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                #O-00000001
                                            </td>

                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                2025-00-00
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                Order Name
                                            </td>

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                                                0000,00€
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                                    <span>Closed</span>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td
                                                class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                                                <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                                    <a href="" class="action-btn relative group">
                                                        <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Show') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="action-btn relative group bg-danger hover:bg-red-600">
                                                        <svg class="size-4" viewBox="0 0 12 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                                                fill="#F2F2F2" />
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Delete') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap font-14">

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                #O-00000001
                                            </td>

                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                2025-00-00
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                Order Name
                                            </td>

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                                                0000,00€
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                                    <span>Closed</span>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td
                                                class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                                                <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                                    <a href="" class="action-btn relative group">
                                                        <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Show') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="action-btn relative group bg-danger hover:bg-red-600">
                                                        <svg class="size-4" viewBox="0 0 12 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                                                fill="#F2F2F2" />
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Delete') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap font-14">

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                #O-00000001
                                            </td>

                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                2025-00-00
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                Order Name
                                            </td>

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                                                0000,00€
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                                    <span>Closed</span>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td
                                                class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                                                <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                                    <a href="" class="action-btn relative group">
                                                        <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Show') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="action-btn relative group bg-danger hover:bg-red-600">
                                                        <svg class="size-4" viewBox="0 0 12 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                                                fill="#F2F2F2" />
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Delete') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap font-14">

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                #O-00000001
                                            </td>

                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                2025-00-00
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                Order Name
                                            </td>

                                            <td
                                                class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                                                0000,00€
                                            </td>
                                            <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                                                <div class="flex items-center gap-2">
                                                    <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                                    <span>Closed</span>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td
                                                class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                                                <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                                    <a href="" class="action-btn relative group">
                                                        <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Show') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                    <a href=""
                                                        class="action-btn relative group bg-danger hover:bg-red-600">
                                                        <svg class="size-4" viewBox="0 0 12 15" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.42857 5V13.3333H2.57143V5H9.42857ZM8.14286 0H3.85714L3 0.833333H0V2.5H12V0.833333H9L8.14286 0ZM11.1429 3.33333H0.857143V13.3333C0.857143 14.25 1.62857 15 2.57143 15H9.42857C10.3714 15 11.1429 14.25 11.1429 13.3333V3.33333Z"
                                                                fill="#F2F2F2" />
                                                        </svg>
                                                        <span
                                                            class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                                            <span
                                                                class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Delete') }}</span>
                                                            <span
                                                                class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab h-full">
                            <div id="calendar"></div>
                            <div class="mt-8">
                                <h2 class="font-18 text-dark_1 mb-3 font-semibold">{{ __('Resume') }}</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    <div>
                                        <label class="lara-label-sm">Vacation Days Entitled</label>
                                        <p class="font-16 text-dark_2 font-medium">22</p>
                                    </div>
                                    <div>
                                        <label class="lara-label-sm">Vacation Days Used</label>
                                        <p class="font-16 text-dark_2 font-medium">12</p>
                                    </div>
                                    <div>
                                        <label class="lara-label-sm">Vacation Days Remaining</label>
                                        <p class="font-16 text-dark_2 font-medium">10</p>

                                    </div>
                                    <div>
                                        <label class="lara-label-sm">Total Absences</label>
                                        <div class="tag-btn bg-success/50">3</div>
                                    </div>
                                    <div>
                                        <label class="lara-label-sm">Justified Absences</label>
                                        <div class="font-16 text-dark_2 font-medium">3</div>
                                    </div>
                                    <div>
                                        <label class="lara-label-sm">Unjustified Absences</label>
                                        <div class="font-16 text-dark_2 font-medium">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab h-full">
                            <span class="show-no-data">{{ __('No data') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-section name="style">
        <link rel="stylesheet" href="{{ Vite::css('select.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar/main.min.css" rel="stylesheet">

    </x-section>
    <x-section name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar/main.min.js"></script>
        <script src="{{ Vite::js('tab.js') }}"></script>
        <script>
            tabFunc('component-tab');

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: '/api/events',
                    timeZone: 'UTC',
                    events: [{
                        id: 'a',
                        title: 'my event',
                        start: '2024-12-03'
                    }]
                });
                calendar.render();
            });
        </script>
    </x-section>
</x-app-layout>
