<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10">
        <!-- card section start -->
        <div class="row">
            <div class="lg:w-1/4 md:w-1/3 sm:w-1/2 w-full px-4 mt-8 sm:mt-0">
                <div class="rounded-md p-5 bg-primary text-white">
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
            </div>
            <div class="lg:w-1/4 md:w-1/3 sm:w-1/2 w-full px-4 mt-8 sm:mt-0">
                <div class="rounded-md p-5 bg-secondary text-white">
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
            </div>
            <div class="lg:w-1/4 md:w-1/3 sm:w-1/2 w-full px-4 mt-8 md:mt-0">
                <div class="rounded-md p-5 bg-danger text-white">
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
            </div>
            <div class="lg:w-1/4 md:w-1/3 sm:w-1/2 w-full px-4 mt-8 lg:mt-0">
                <div class="rounded-md p-5 bg-warning text-white">
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
                </div>
            </div>
        </div>
        <!-- card section End -->

        <!-- chart section start -->
        <div class="row mt-8">
            <div class="2xl:w-3/5 lg:w-1/2 w-full px-4">
                <div class="rounded-xl dark:bg-lara-darkBlack bg-white p-6 h-full">
                    <div class="row">
                        <div class="2xl:w-3/5 w-full px-4">
                            <ul class="flex items-center space-x-3">
                                <li class="font-16 font-medium dark:text-white text-lara-primary">{{ __('Total Users') }}</li>
                                <li class="font-14 dark:text-white text-lara-primary">{{ __('Total Projects') }}</li>
                                <li class="font-14 dark:text-white text-lara-primary">{{ __('Operating Status') }}</li>
                            </ul>
                        </div>
                        <div class="2xl:w-2/5 w-full px-4 mt-3 2xl:mt-0">
                            <div class="flex items-center space-x-7">
                                <div class="flex items-center space-x-1.5">
                                    <div class="w-1.5 h-1.5 rounded-full bg-secondary"></div>
                                    <p class="font-14 font-normal dark:text-white text-lara-primary">{{ __('Current Week') }}</p>
                                </div>
                                <div class="flex items-center space-x-1.5">
                                    <div class="w-1.5 h-1.5 rounded-full bg-primary"></div>
                                    <p class="font-14 font-normal dark:text-white text-lara-primary">{{ __('Previous Week') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 mt-3">
                            <div>
                                <canvas class="dark:text-white text-lara-primary" id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="2xl:w-2/5 lg:w-1/2 w-full px-4 mt-7 lg:mt-0">
                <div class="rounded-xl dark:bg-lara-darkBlack bg-white p-6 h-full">
                    <div class="flex  items-center justify-between">
                        <p class="font-16 font-medium text-gray-500">
                            {{ __('Traffic by Location') }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </div>
                    <div class="mt-14">
                        <div class=" w-full mx-auto">
                            <canvas class="mx-auto" id="myChart"></canvas>
                        </div>
                    </div>
                    <ul>
                        <li class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-1.5">
                                <div class="w-1.5 h-1.5 rounded-full bg-secondary"></div>
                                <p class="font-14 font-normal text-gray-400">{{ __('United States') }}</p>
                            </div>
                            <p class="font-14 text-secondary font-medium">38.6%</p>
                        </li>
                        <li class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-1.5">
                                <div class="w-1.5 h-1.5 rounded-full bg-primary"></div>
                                <p class="font-14 font-normal text-gray-400">{{ __('Canada') }}</p>
                            </div>
                            <p class="font-14 text-primary font-medium">22.5%</p>
                        </li>
                        <li class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-1.5">
                                <div class="w-1.5 h-1.5 rounded-full bg-success"></div>
                                <p class="font-14 font-normal text-gray-400">{{ __('Mexico') }}</p>
                            </div>
                            <p class="font-14 text-success font-medium">30.5%</p>
                        </li>
                        <li class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-1.5">
                                <div class="w-1.5 h-1.5 rounded-full bg-info"></div>
                                <p class="font-14 font-normal text-gray-400">{{ __('Canada') }}</p>
                            </div>
                            <p class="font-14 text-info font-medium">8.5%</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- chart section End -->

        <!-- table section start -->
        <div class="mt-8 w-full">
            <div
            class="dark:bg-lara-darkBlack bg-white rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
            <table class="responsive-table border-spacing-y-1.5 px-6 pb-6 border-separate w-full whitespace-nowrap">
                <thead>
                    <tr
                        class="text-left [&>*:nth-child(2)]:pl-0 [&>*:nth-child(2)]:border-l-0 whitespace-nowrap dark:bg-lara-darkBlack bg-white  text-black-50">

                        <th></th>

                        {{-- id --}}
                        <th class="always-show 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                            <a href="javascript:;" class="block relative">
                                ID
                                <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </th>

                        {{-- customer name --}}
                        <th class="resonsive-sm 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                            <a href="javascript:;" class="block relative">
                                Customer name
                                <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </th>

                        {{-- created date --}}
                        <th class="resonsive-md 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                            <a href="javascript:;" class="block relative">
                                Create date
                                <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </th>

                        {{-- last updated --}}
                        <th class="resonsive-xl 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                            <a href="javascript:;" class="block relative">
                                Last update
                                <div class="tableArrow flex flex-col font-14 absolute -top-1 -right-4">
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg class="w-2.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </a>
                        </th>

                        {{-- note --}}
                        <th class="always-hidden 2xl:py-3 py-2.5 font-14 font-medium capitalize px-4 dark:bg-lara-darkBlack bg-white">
                            Notes
                        </th>

                        <th
                            class="2xl:py-3 py-2.5 font-14 text-right font-medium capitalize pl-6 pr-2.5 dark:bg-lara-darkBlack bg-white">
                            <p>Action</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black-80">
                    <tr class="text-left [&>*:nth-child(2)]:pl-0 [&>*:nth-child(2)]:border-l-0 whitespace-nowrap dark:bg-lara-darkBlack bg-white font-14 font-medium">

                        <td class="dark:bg-lara-whiteGray bg-light-table-row w-10">
                            <div class="w-10">
                                <button class="tableDropBtn w-4 h-4 2xl:w-5 2xl:h-5 mx-auto block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="mx-auto  text-primary">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="hidden text-danger">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 12h-15"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="hidder-column hidden">
                                <ul class="px-4 py-1.5 2xl:py-2.5 flex flex-wrap font-14">

                                    {{-- new row last id --}}
                                    <li class="always-hidden pr-6">
                                        <div class="flex flex-wrap">
                                            <span class="capitalize font-semibold pr-2 text-black-50">ID
                                                :</span>
                                            <span class="capitalize"> 22070022</span>
                                        </div>
                                    </li>

                                    {{-- new row last customer name --}}
                                    <li data-val="2" class="new-row-resonsive-sm pr-6">
                                        <div class="flex flex-wrap">
                                            <span class="capitalize font-semibold pr-2 text-black-50">customer name
                                                :</span>
                                            <span class="capitalize">Inditex</span>
                                        </div>
                                    </li>

                                    {{-- new row create date --}}
                                    <li class="new-row-resonsive-md pr-6">
                                        <div class=" flex flex-wrap">
                                            <span class="capitalize font-semibold pr-2 text-black-50">Create date
                                                :</span>
                                            <span class="capitalize">
                                                <p class="text-[#A8A8A8] font-semibold">2023-00-00</p>
                                            </span>
                                        </div>
                                    </li>

                                    {{-- new row last update --}}
                                    <li class="new-row-resonsive-xl pr-6">
                                        <div class="flex flex-wrap">
                                            <span class="capitalize font-semibold pr-2 text-black-50">last update
                                                :</span>
                                            <span class="capitalize"> 2023-00-00</span>
                                        </div>
                                    </li>

                                    {{-- new row note --}}
                                    <li class="always-block pr-6">
                                        <div class="flex flex-wrap">
                                            <span class="capitalize font-semibold pr-2 text-black-50">note
                                                :</span>
                                            <span class="capitalize">Lorem ipsum</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </td>

                        {{-- id --}}
                        <td class="px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                            22070022
                        </td>

                        {{-- customer name --}}
                        <td class="resonsive-sm px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                            <div class="flex items-center space-x-2">
                                <img class="w-7 h-7 object-cover rounded-full object-center"
                                    src="{{ asset('storage/images/users/avatar.jpg') }}" alt="">
                                <p class="uppercase">Inditex</p>
                            </div>
                        </td>

                        {{-- created date --}}
                        <td class="resonsive-md px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                            <p class="text-[#A8A8A8] font-semibold">2023-00-00 <span
                                    class="font-normal text-[#A8A8A8]/50">by Pedro Silva</span></p>
                        </td>

                        {{-- last updated --}}
                        <td class="resonsive-xl px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                            <p class="text-[#A8A8A8] font-semibold">2023-00-00 <span
                                    class="font-normal text-[#A8A8A8]/50">by Pedro Silva</span></p>
                        </td>

                        {{-- note --}}
                        <td class="always-hidden px-4 py-1.5 2xl:py-2.5 text-left bg-light-table-row dark:bg-lara-whiteGray text-lara-gray-400 dark:text-white  border-l border-white dark:border-lara-darkBlack">
                            <p class="text-[#A8A8A8] font-semibold">Lorem ipsum</p>
                        </td>

                        {{-- action --}}
                        <td class="px-1.5 2xl:px-2.5 py-1.5 2xl:py-2.5 text-md whitespace-normal bg-light-table-row dark:bg-lara-whiteGray">
                            <div class="flex items-center justify-end space-x-1">
                                <a href=""
                                    class="relative group w-8 h-8 hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 border dark:border-none border-gray-300 hover:text-white duration-300 flex items-center capitalize dark:bg-black-30 bg-white dark:bg-opacity-20 rounded-md dark:text-white text-lara-gray-400">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                        <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Show")}}</span>
                                        <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                    </span>
                                </a>
                                <a href=""
                                    class="relative group w-8 h-8 hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 border dark:border-none border-gray-300 hover:text-white duration-300 flex items-center capitalize dark:bg-black-30 bg-white dark:bg-opacity-20 rounded-md dark:text-white text-lara-gray-400">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                        </path>
                                    </svg>
                                    <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                        <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Edit")}}</span>
                                        <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                    </span>
                                </a>
                                <a href=""
                                    class="relative group w-8 h-8 duration-300 flex items-center capitalize bg-danger hover:bg-red-600 rounded-md text-white ">
                                    <svg class="w-4 mx-auto" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                        <span class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{__("Delete")}}</span>
                                        <span class="absolute w-2 h-2 bottom-0 right-1/2 translate-x-1/2 rotate-45 -mb-1 -z-20 bg-black"></span>
                                    </span>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <!-- table section End -->
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('table.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
        <script>
            const data = {
                labels: [
                    'Secondary',
                    'Primary',
                    'Info',
                    'Success',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [38.6, 22.6, 22.6, 22.6],
                    backgroundColor: [
                        'rgba(14, 57, 95, 1)',
                        'rgba(241, 90, 79, 1)',
                        'rgba(71, 163, 204, 1)',
                        'rgba(80, 205, 137, 1)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
        <script>
            const labels2 = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            const data2 = {
                labels: labels2,
                datasets: [{
                        label: 'Current Week',
                        data: [35, 40, 25, 51, 66, 75, 80],
                        fill: false,
                        borderColor: 'rgba(80, 205, 137, 1)',
                        tension: 0.1
                    },
                    {
                        label: 'Previous Week',
                        data: [30, 45, 35, 50, 60, 80, 85],
                        fill: false,
                        borderColor: 'rgba(14, 57, 95, 1)',
                        tension: 0.1
                    },
                ]
            };
            const config2 = {
                type: 'line',
                data: data2,
            };

            const myChart2 = new Chart(
                document.getElementById('myChart2'),
                config2
            );
        </script>
    </x-section>
</x-app-layout>
