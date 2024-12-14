<x-app-layout>
    <x-section name="title">{{ __('Components') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="w-full">
        <div class="dark:bg-lara-darkBlack rounded-xl overflow-x-scroll customScrollX min-h-[calc(100vh-390px)]">
            <table class="responsive-table w-full whitespace-nowrap">
                <thead class="text-dark_1">
                    <tr class="uppercase text-left whitespace-nowrap">
                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Machine ID
                        </th>

                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4 ">

                            machine Name
                        </th>

                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4 ">
                            Machine Type
                        </th>

                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Acquisition Date
                        </th>

                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Production Capacity<br/>
                            <span class="font-12">(per hour)</span>
                        </th>
                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Operating Cost<br/>
                            <span class="font-12">(per hour)</span>
                        </th>
                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Shifts
                        </th>
                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            Sector
                        </th>
                        <th class="2xl:pt-3 pt-2.5 font-14 font-medium px-4">
                            status
                        </th>

                        <th class="2xl:pt-3 pt-2.5 font-14 text-right font-medium pl-6 pr-2.5 ">
                            <p>Action</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-dark_2">
                    <tr class="text-left whitespace-nowrap font-14">

                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            #MC-001
                        </td>

                        <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Laser Cutter Pro 5000
                        </td>
                        <td class="bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left">
                            Cutting Machine
                        </td>


                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            2020-03-15
                        </td>
                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            50 units
                        </td>
                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            20€
                        </td>
                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            Morning, Evening
                        </td>
                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            Sector A
                        </td>
                        <td class="font-semibold bg-optm-gray-300 px-4 py-1.5 2xl:py-2.5 text-left ">
                            <span class="py-1.5 2xl:py-2.5 px-2.5 bg-optm-purple/20 rounded-full">Active</span>
                        </td>
                        {{-- action --}}
                        <td class="bg-optm-gray-300 px-2 py-1.5 2xl:py-2.5 text-md whitespace-normal">
                            <div class="flex items-center space-x-1.5 justify-end">
                                <a href="{{ route('admin.machines-and-equipment.show', 'slug') }}"
                                    class="action-btn relative group">
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
                                <a href="" class="action-btn relative group bg-optm-deep-purple">
                                    @svg('heroicon-s-pencil', 'w-4 mx-auto')
                                    <span
                                        class="absolute -top-full z-10 -translate-y-1.5 translate-x-1/2 right-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300 pointer-events-none">
                                        <span
                                            class="whitespace-nowrap block bg-black px-2 text-gray-200 py-1 rounded-md text-f10">{{ __('Edit') }}</span>
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
</x-app-layout>
