<header
    {{ $attributes->merge(['class' => 'bg-optm-gray-200 dark:bg-dark-optm-gray-200 sticky top-0 z-40 2xl:h-[80px] h-[75px] w-full flex justify-between flex-wrap sm:flex-nowrap gap-4']) }}>
    @php
        $userNotifications = get_user_notifications();
    @endphp
    <button id="sidebar-collapse-button">
        <svg class="dark:text-optm-gray-200 w-4 2xl:w-5 mx-auto pointer-events-none" stroke="currentColor" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="2.00152e-07" y1="16.5" x2="20" y2="16.5" stroke="currentColor" stroke-width="3" />
            <line x1="2.23158e-07" y1="9" x2="20" y2="9" stroke="currentColor" stroke-width="3" />
            <line x1="2.23158e-07" y1="1.5" x2="13.3333" y2="1.5" stroke="currentColor" stroke-width="3" />
        </svg>
    </button>

    <div class="flex items-center gap-3">
        <div class="relative">
            <div
                class="hover-dropdown-box cursor-pointer size-[39px] 2xl:size-[50px] bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex justify-center items-center">
                <span class="relative pointer-events-none">
                    @svg('heroicon-s-bell', 'w-5 2xl:w-6 text-black-50 dark:text-optm-gray-200')
                    <span
                        class="border border-gray-700 size-2 2xl:size-3 absolute top-0 right-0 bg-optm-purple rounded-full"></span>
                </span>

            </div>
            <div
                class="hover-dropdown-show-box hidden z-10 absolute w-56 2xl:w-60 transition-all duration-500 right-0 top-full mt-2 2xl:mt-3">
                <div class="w-4 overflow-hidden inline-block absolute z-40 top-1 right-3.5 2xl:right-4">
                    <div class="h-3 w-3 dark:bg-lara-gray-300 bg-white rotate-45 transform origin-bottom-left"></div>
                </div>
                <div
                    class="dark:bg-lara-gray-300 bg-white mt-4 rounded-xl shadow-lara-shadow3 relative overflow-hidden">
                    <div class="p-4 font-sm font-16 text-lara-whiteGray text-center">
                        {{ __('You have :count notifications', ['count' => $userNotifications['count_unread']]) }}
                    </div>
                    <ul class="h-52 w-full overflow-y-auto text-TextColor customScroll">
                        <li class="">
                            @foreach ($userNotifications['list'] as $notification)
                                <a
                                    class="p-3 border-t text-lara-whiteGray border-lara-gray-light font-14 flex items-center space-x-3 hover:bg-gray-100">
                                    <div>
                                        <p class="text-lara-whiteGray ">
                                            {{ $notification->message }}
                                        </p>
                                    </div>
                                    <div class="text-lg">
                                        @if ($notification->read_at)
                                            @svg('heroicon-o-envelope-open', 'w-6')
                                        @else
                                            @svg('heroicon-o-envelope', 'w-6')
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </li>
                    </ul>
                    <div class="p-4">
                        <a class="rounded-md block px-3 py-2 dark:bg-lara-primary bg-gray-200 hover:bg-opacity-90 hover: border-t border-lara-gray-light dark:text-white text-lara-whiteGray font-14 text-center"
                            href="{{ route('notifications.index') }}">{{ __('See All Notifications') }}</a>
                    </div>
                </div>
            </div>
            {{-- notification end --}}
        </div>


        {{-- dark night --}}
        <div
            class="dark-light cursor-pointer size-[39px] 2xl:size-[50px] bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex justify-center items-center">
            <span class="relative pointer-events-none">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 2xl:w-6 text-black-50 dark:text-optm-gray-200 block dark:hidden"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 2xl:w-6 text-black-50 hidden dark:block dark:text-white"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                />
              </svg>
            </span>
        </div>

         <!-- lang start -->
         @if (settings('lang_switcher'))
         <div class="relative">
             <div class="px-3 hover-dropdown-box cursor-pointer h-[39px] 2xl:h-[50px] bg-optm-gray-300 dark:bg-dark-optm-gray-300 rounded-lara-radious flex justify-center items-center">
                 @if (settings('lang_switcher_item') === 'icon')
                     <div class="pointer-events-none flex items-center justify-center">
                         <div class="w-6 2xl:w-7 h-6 2xl:h-7 country-flag overflow-hidden">
                         </div>
                     </div>
                 @else
                     <div class="langName pointer-events-none font-medium font-18 text-dark_2/80 dark:text-optm-gray-200 overflow-hidden text-ellipsis uppercase">
                     </div>
                 @endif
             </div>
             <div
             class="group hover-dropdown-show-box hidden z-10  transition-all duration-500 rounded absolute right-1/2 translate-x-[22px] 2xl:translate-x-[24px] mt-2">
                 <div
                     class="w-4 overflow-hidden inline-block absolute top-1 right-3.5 2xl:right-4 z-30">
                     <div
                     class="angle-down h-3 w-3 duration-300 rotate-45 transform origin-bottom-left">
                     </div>
                 </div>
                 <div class="shadow-[0px_0px_5px_0px_rgba(0,0,0,0.1)] rounded-xl overflow-hidden cursor-pointer mt-4 relative ">
                     <ul class="text-black-80 langParent">
                         @foreach (language() as $shortCode => $language)
                             <li class="flex items-center justify-center">
                                 <a href="javascript:;"
                                 class="{{ App::getLocale() === $shortCode ? 'active' : '' }} lang-btn w-full lang-style duration-300 language flex items-center space-x-3"
                                     onclick="setLang('{{ $shortCode }}')">
                                     @if (settings('lang_switcher_item') === 'icon')
                                         <div class="w-6 drop-flag">
                                             <img alt=""
                                                 class="w-full h-full object-center object-cover"
                                                 src="{{ get_language_icon($language['icon']) }}">
                                         </div>
                                     @elseif (settings('lang_switcher_item') === 'name')
                                         <div class="font-medium drop-lang-name uppercase">
                                             {{ $language['name'] }}</div>
                                     @elseif (settings('lang_switcher_item') === 'short_code')
                                         <div class="font-medium drop-lang-name uppercase">
                                             {{ $shortCode }}</div>
                                     @endif
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     @endif
     <!-- lang end -->
        <div class="py-1 2xl:py-1.5 relative px-4 flex items-center rounded-lara-radious w-fit bg-optm-gray-300 dark:bg-dark-optm-gray-300">
            <div class="hover-dropdown-box cursor-pointer whitespace-nowrap">
                <div class="pointer-events-none flex gap-2 justify-end items-center">
                    <div class="text-dark_2 dark:text-optm-gray-200">
                        <h3 class="max-w-[150px] overflow-hidden text-ellipsis font-14 font-medium uppercas">
                            {{ auth()->user()->first_name }}
                        </h3>
                        <p class="max-w-[200px] overflow-hidden text-ellipsis font-12">
                            {{ ucwords(auth()->user()->assigned_role) }}
                        </p>
                    </div>
                    <div class="size-7 2xl:size-9 rounded-full overflow-hidden">
                        <img src="{{ auth()->user()->avatar }}" alt="">
                    </div>
                </div>
            </div>
            <div
                class="hover-dropdown-show-box hidden z-10 absolute w-40 transition-all duration-500 top-full mt-2 2xl:mt-3 right-0">

                <div class="mt-4 shadow-lara-shadow2 rounded-xl overflow-hidden">
                    <ul>
                        <li>
                            <a class="group dark:bg-lara-gray-300 bg-white dark:hover:bg-lara-whiteGray hover:bg-gray-100 text-center lang-btn duration-300 text-lara-whiteGray dark:hover:text-white hover:text-lara-whiteGray block"
                                href="{{ route('profile.index') }}">
                                {{ __('Profile') }}
                                <span
                                    class="dark:group-hover:bg-lara-whiteGray group-hover:bg-gray-100 duration-300 w-3 h-3 dark:bg-lara-gray-300 bg-white inline-block rotate-45 absolute top-2.5 right-5"></span>
                            </a>
                        </li>
                        <li>
                            <a class="dark:bg-lara-gray-300 bg-white dark:hover:bg-lara-whiteGray hover:bg-gray-100 text-center lang-btn duration-300 text-lara-whiteGray dark:hover:text-white hover:text-lara-whiteGray block"
                                href="{{ route('profile.edit') }}">
                                {{ __('Edit Profile') }}
                            </a>
                        </li>
                        @if (has_permission('admin.settings.index'))
                            <li>
                                <a class="dark:bg-lara-gray-300 bg-white dark:hover:bg-lara-whiteGray hover:bg-gray-100 text-center lang-btn duration-300 text-lara-whiteGray dark:hover:text-white hover:text-lara-whiteGray block"
                                    href="{{ route('admin.settings.index') }}">
                                    {{ __('Setting') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dark:bg-lara-gray-300 bg-white dark:hover:bg-lara-whiteGray hover:bg-gray-100 text-center lang-btn duration-300 text-lara-whiteGray dark:hover:text-white hover:text-lara-whiteGray block confirmation"
                                data-form-id="logout" data-form-method="POST" data-alert="{{ __('Are you sure?') }}"
                                href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
