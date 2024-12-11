<header class="flex sm:px-10 px-4 py-4 shadow items-center mb-px relative z-50">
    <div class="flex items-center">
        <!-- Menu Toggler -->
        <a href="javascript:" id="menu-toggler">
            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
        </a>
        <!-- Brand -->
        <span class="font-extrabold text-2xl uppercase text-gray-700 ml-2">{{ config('app.name') }}</span>
    </div>
    <!--    =====================================-->
    <!--            start right side-->
    <!--    =====================================-->
    <div class="ml-auto flex items-center">
        <!--        notification-->
        <div class="hover-dropdown-box mr-5">
            <div class="cursor-pointer relative">
                <span
                    class="absolute -top-4 -right-3 rounded-full border border-default-color px-2 leading-tight text-xs text-default-color">3</span>
                <svg class="h-6 w-6 text-gray-500 hover:text-default-color" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </div>
            <div class="hover-dropdown-show-box group-hover:block">
                <div class="shadow bg-white mt-4 relative">
                    <div class="w-4 overflow-hidden inline-block absolute -top-3 right-1">
                        <div class=" h-3 w-3 bg-white shadow rotate-45 transform origin-bottom-left"></div>
                    </div>
                    <div class="flex p-4 items-center justify-between">
                        <h5 class="text-md uppercase">{{ __('Notifications') }}</h5>
                        <a class="text-sm px-3 py-1 border border-default-color text-default-color hover:bg-default-color hover:text-white transition-all rounded-full"
                            href="javascript:">{{ __('View All') }}</a>
                    </div>
                    <ul>
                        <li class="p-4 border-t border-gray-100 text-xs">
                            <p class="text-gray-600 truncate">Lorem ipsum dolor, sit amet consectetur.</p>
                            <small class="text-gray-400">Today</small>
                        </li>
                        <li class="p-4 border-t border-gray-100 text-xs">
                            <p class="text-gray-600 truncate">Lorem ipsum dolor, sit amet consectetur.</p>
                            <small class="text-gray-400">Today</small>
                        </li>
                        <li class="p-4 border-t border-gray-100 text-xs">
                            <p class="text-gray-600 truncate">Lorem ipsum dolor, sit amet consectetur.</p>
                            <small class="text-gray-400">Today</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--        profile-->
        <div class="hover-dropdown-box">
            <div
                class="w-10 h-10 rounded-full border bg-gray-50 border-gray-200 text-center overflow-hidden cursor-pointer">
                <img alt="Profile Image" class="w-10 h-10 object-cover" src="{{ asset('images/profile.jpg') }}">
            </div>
            <div class="hover-dropdown-show-box group-hover:block">
                <div class="shadow bg-white mt-2">
                    <div class="w-4 overflow-hidden inline-block absolute -top-1 right-4">
                        <div class=" h-3 w-3 bg-white shadow rotate-45 transform origin-bottom-left"></div>
                    </div>
                    <div class="flex border-b border-gray-100 p-4 items-center">
                        <div class="mr-4">
                            <img alt="Profile Image" class="w-12 h-12 object-cover"
                                src="{{ asset('images/profile.jpg') }}">
                        </div>
                        <div>
                            <h3 class="text-md uppercase">{{ auth()->user()->fullName }}</h3>
                            <p class="text-xs text-gray-500">{{ ucwords(auth()->user()->assigned_role) }}</p>
                        </div>
                    </div>
                    <ul class="border-b border-gray-100 px-4 py-3">
                        <li class="py-1">
                            <a class="text-gray-500 hover:text-default-color block"
                                href="{{ route('profile.index') }}">{{ __('View Profile') }}</a>
                        </li>
                        <li class="py-1"><a class="text-gray-500 hover:text-default-color block"
                                href="javascript:">{{ __('Notification') }}</a>
                        </li>
                    </ul>
                    <div class="p-4">
                        <a class="text-gray-500 hover:text-default-color block confirmation" data-form-id="logout"
                            data-form-method="POST" data-alert="{{ __('Are you sure?') }}"
                            href="{{ route('logout') }}">{{ __('Logout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    =====================================-->
    <!--            end right side-->
    <!--    =====================================-->
</header>
