<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            {{__("Welcome")}}, <span class="text-optm-purple"> {{ auth()->user()->first_name }}
            </span>
        </x-breadcrumb>
    </x-section>
    <div>
        <div class="text-dark_1 dark:text-optm-gray-200 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6 2xl:mb-8">
            <div class="flex items-center gap-6 rounded-2xl bg-[#10122B1A] dark:bg-dark_2 p-4 xl:p-6">
                <img class="dark:brightness-[6]" src="{{ Vite::image('machine.png') }}" alt="">
                <div>
                    <p class="font-24 font-semibold">12</p>
                    <p class="font-14">Machines and Equipment</p>
                </div>
            </div>
            <div class="flex items-center gap-6 rounded-2xl bg-[#10122B1A] dark:bg-dark_1 p-4 xl:p-6">
                <img class="dark:brightness-[6]" src="{{ Vite::image('sections.png') }}" alt="">
                <div>
                    <p class="font-24 font-semibold">3</p>
                    <p class="font-14">Sections</p>
                </div>
            </div>
            <div class="flex items-center gap-6 rounded-2xl bg-[#10122B1A] dark:bg-optm-purple p-4 xl:p-6">
                <img class="dark:brightness-[6]" src="{{ Vite::image('huuman-resource.png') }}" alt="">
                <div>
                    <p class="font-24 font-semibold">78</p>
                    <p class="font-14">Human Resources</p>
                </div>
            </div>
            <div class="flex items-center gap-6 rounded-2xl bg-[#10122B1A] dark:bg-optm-deep-purple p-4 xl:p-6">
                <img class="dark:brightness-[6]" src="{{ Vite::image('products.png') }}" alt="">
                <div>
                    <p class="font-24 font-semibold">143</p>
                    <p class="font-14">Products</p>
                </div>
            </div>

            {{-- <div class="rounded-2xl p-4 xl:p-6 bg-[#10122B1A] dark:bg-optm-purple">
                <div class="flex items-center justify-between">
                    <p class="font-20 font-medium">{{ __('Users') }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="font-34 font-medium">{{ $userCount }}</p>
                    <div class="flex items-center justify-between">
                        <p class="font-14 font-medium">+{{ round($percentUser) }}.00</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl p-4 xl:p-6 bg-[#10122B1A] dark:bg-optm-purple">
                <div class="flex items-center justify-between">
                    <p class="font-20 font-medium">{{ __('Permission') }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="font-34 font-medium">72k</p>
                    <div class="flex items-center justify-between">
                        <p class="font-14 font-medium">+11.01</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl p-4 xl:p-6 bg-[#10122B1A] dark:bg-optm-purple">
                <div class="flex items-center justify-between">
                    <p class="font-20 font-medium">{{ __('Active Users') }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="font-34 font-medium">{{ $activeUserCount }}</p>
                    <div class="flex items-center justify-between">
                        <p class="font-14 font-medium">+{{ round($percentActiveUser) }}.00%</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl p-4 xl:p-6 bg-[#10122B1A] dark:bg-optm-purple">
                <div class="flex items-center justify-between">
                    <p class="font-20 font-medium">{{ __('Announcement') }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="font-34 font-medium">{{ $announcmentCount }}</p>
                    <div class="flex items-center justify-between">
                        <p class="font-14 font-medium">+{{ round($percentAnnouncment) }}.00%</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                </div>
            </div> --}}
        </div>

        <div
            class="font-18 py-3 2xl:py-4 px-2 xl:px-3 flex items-center justify-between bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious">
            <span class="text-dark_2 dark:text-optm-gray-200 font-medium">{{ __('Orders') }}</span>
            <a class="text-optm-purple hover:underline" href="">{{ __('See All') }}</a>
        </div>
        <div class="rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
            <table class="responsive-table w-full whitespace-nowrap">
                <thead class="text-dark_1 dark:text-branco-sujo">
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
                <tbody class="text-dark_2 dark:text-optm-gray-200">
                    <tr class="text-left whitespace-nowrap font-14">

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #O-00000001
                        </td>

                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            2025-00-00
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Order Name
                        </td>

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            0000,00€
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            <div class="flex items-center gap-2">
                                <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                <span>Closed</span>
                            </div>
                        </td>

                        {{-- action --}}
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                <a href="" class="action-btn relative group">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
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
                                <a href="" class="action-btn relative group bg-danger hover:bg-red-600">
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

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #O-00000001
                        </td>

                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            2025-00-00
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Order Name
                        </td>

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            0000,00€
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            <div class="flex items-center gap-2">
                                <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                <span>Closed</span>
                            </div>
                        </td>

                        {{-- action --}}
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                <a href="" class="action-btn relative group">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
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
                                <a href="" class="action-btn relative group bg-danger hover:bg-red-600">
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

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #O-00000001
                        </td>

                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            2025-00-00
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Order Name
                        </td>

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            0000,00€
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            <div class="flex items-center gap-2">
                                <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                <span>Closed</span>
                            </div>
                        </td>

                        {{-- action --}}
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                <a href="" class="action-btn relative group">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
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
                                <a href="" class="action-btn relative group bg-danger hover:bg-red-600">
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

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #O-00000001
                        </td>

                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            2025-00-00
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Order Name
                        </td>

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            0000,00€
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            <div class="flex items-center gap-2">
                                <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                <span>Closed</span>
                            </div>
                        </td>

                        {{-- action --}}
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                <a href="" class="action-btn relative group">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
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
                                <a href="" class="action-btn relative group bg-danger hover:bg-red-600">
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

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #O-00000001
                        </td>

                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            2025-00-00
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Order Name
                        </td>

                        <td class="font-semibold bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            0000,00€
                        </td>
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            <div class="flex items-center gap-2">
                                <span class="bg-lara-green rounded-full size-4 2xl:size-5"></span>
                                <span>Closed</span>
                            </div>
                        </td>

                        {{-- action --}}
                        <td class="bg-optm-gray-300 dark:bg-dark-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1 2xl:space-x-1.5 justify-end">
                                <a href="" class="action-btn relative group">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
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
                                <a href="" class="action-btn relative group bg-danger hover:bg-red-600">
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
    <x-section name="scripts">
        <script src="{{ Vite::js('table.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    </x-section>
</x-app-layout>
