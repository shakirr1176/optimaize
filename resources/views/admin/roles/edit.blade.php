@inject('str', 'Illuminate\Support\Str')
<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">

        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('admin.roles.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <!-- role Permission start -->
    <div class="rounded-xl dark:bg-lara-darkBlack">
        <div class="row">
            <form class="w-full" method="post" action="{{ route('admin.roles.update', $role->slug) }}">
                <div class="w-full px-4">
                    @csrf
                    @method('PUT')
                    @php $ModuleClasses = [] @endphp
                    @foreach ($routes as $name => $routeGroups)
                        @php
                            $checkBox = 3;
                            $class = '';
                        @endphp
                        @if (empty(settings('show_fixed_roles')) && $checkBox != 3)
                            @continue
                        @endif

                        @php $allItems = true @endphp
                        <div class="role-permission rounded-xl overflow-hidden mb-6">
                            <div class="dark:bg-lara-primary bg-optm-gray-300 py-3 px-6 border dark:border-lara-darkBlack">
                                <div class="row items-center">
                                    @foreach ($routeGroups as $groupName => $permissionLists)
                                        @foreach ($permissionLists as $permissionName => $routeList)
                                            @php
                                                if (!isset($role->permissions[$name][$groupName]) || !in_array($permissionName, $role->permissions[$name][$groupName])) {
                                                    $allItems = false;
                                                }
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    <div class="main-input lg:w-1/5 w-full px-4">
                                        <div class="flex items-center space-x-3">
                                            <label
                                                class="w-6 h-6 flex justify-center items-center cursor-pointer custom-input-checked rounded">
                                                <input class="hidden" type="checkbox">
                                                <svg class="checked-item h-5 w-5 rounded border-2 dark:border-lara-gray border-gray-400 text-transparent"
                                                viewBox="0 0 172 172">
                                                <g fill="none" font-family="none" font-size="none"
                                                    font-weight="none" stroke-miterlimit="10"
                                                    stroke-width="none" style="mix-blend-mode:normal"
                                                    text-anchor="none">
                                                    <path d="M0 172V0h172v172z"></path>
                                                    <path
                                                        d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                                        fill="currentColor" stroke-width="2"></path>
                                                </g>
                                            </svg>
                                            </label>
                                            <div class="cursor-pointer rolebutton">
                                                <h2 class="font-16 dark:text-white text-dark_2 font-medium">
                                                    {{ $str->title($str->replace('_', ' ', $name)) }}</h2>
                                                <div class="dark:text-white text-dark_2 flex items-center space-x-3">
                                                    <p class="font-14">{{ __('Show Items') }}</p>
                                                    {{-- @svg('heroicon-s-chevron-up', 'w-4') --}}
                                                    @svg('heroicon-s-chevron-down', 'w-4')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:w-4/5 w-full px-4">
                                        <div class="row">
                                            <div class="sub-col-input md:w-1/4 px-4 mt-5 lg:mt-0 w-1/4">
                                                <p class="dark:text-white text-dark_2 font-14 font-medium mb-1 text-center">
                                                    {{ __('Read Access') }}</p>
                                                <div class="flex justify-center">
                                                    <label class="switch relative inline-block">
                                                        <input class="opacity-0 w-0 h-0" type="checkbox">
                                                        <span
                                                            class="dark:text-white text-dark_2 flex px-3 uppercase text-base items-center justify-between slider round absolute cursor-pointer inset-0 bg-black-30 duration-300">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="sub-col-input md:w-1/4 px-4 mt-5 lg:mt-0 w-1/4">
                                                <p class="dark:text-white text-dark_2 font-14 font-medium mb-1 text-center">
                                                    {{ __('Write Access') }}</p>
                                                <div class="flex justify-center">
                                                    <label class="switch relative inline-block">
                                                        <input class="opacity-0 w-0 h-0" type="checkbox">
                                                        <span
                                                            class="dark:text-white text-dark_2 flex px-3 uppercase text-base items-center justify-between slider round absolute cursor-pointer inset-0 bg-black-30 duration-300">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="sub-col-input md:w-1/4 px-4 mt-5 lg:mt-0 w-1/4">
                                                <p class="dark:text-white text-dark_2 font-14 font-medium mb-1 text-center">
                                                    {{ __('Modify Access') }}</p>
                                                <div class="flex justify-center">
                                                    <label class="switch relative inline-block">
                                                        <input class="opacity-0 w-0 h-0" type="checkbox">
                                                        <span
                                                            class="dark:text-white text-dark_2 flex px-3 uppercase text-base items-center justify-between slider round absolute cursor-pointer inset-0 bg-black-30 duration-300">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="sub-col-input md:w-1/4 px-4 mt-5 lg:mt-0 w-1/4">
                                                <p class="dark:text-white text-dark_2 font-14 font-medium mb-1 text-center">
                                                    {{ __('Delete Access') }}</p>
                                                <div class="flex justify-center">
                                                    <label class="switch relative inline-block">
                                                        <input class="opacity-0 w-0 h-0" type="checkbox">
                                                        <span
                                                            class="dark:text-white text-dark_2 flex px-3 uppercase text-base items-center justify-between slider round absolute cursor-pointer inset-0 bg-black-30 duration-300">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="roleDrop hidden">
                                @php $allSubModules = true @endphp
                                @foreach ($routeGroups as $groupName => $permissionLists)
                                    <div class="sub-row-input-parent dark:bg-lara-primary bg-optm-gray-300 py-5 px-6">
                                        @php $allSubModules = true @endphp
                                        @foreach ($permissionLists as $permissionName => $routeList)
                                            @php
                                                if (!isset($role->permissions[$name][$groupName]) || !in_array($permissionName, $role->permissions[$name][$groupName])) {
                                                    $allSubModules = false;
                                                }
                                            @endphp
                                        @endforeach
                                        <div class="row">
                                            <div class="sub-row-input lg:w-1/5 w-full px-4">
                                                <div class="flex items-center space-x-3">
                                                    <label
                                                        class=" w-6 h-6  flex justify-center items-center cursor-pointer custom-input-checked rounded">
                                                        <input class="hidden" type="checkbox">
                                                        <svg class="checked-item h-5 w-5 rounded border-2 dark:border-lara-gray border-gray-400 text-transparent"
                                                            viewBox="0 0 172 172">
                                                            <g fill="none" font-family="none" font-size="none"
                                                                font-weight="none" stroke-miterlimit="10"
                                                                stroke-width="none" style="mix-blend-mode:normal"
                                                                text-anchor="none">
                                                                <path d="M0 172V0h172v172z"></path>
                                                                <path
                                                                    d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                                                    fill="currentColor" stroke-width="2"></path>
                                                            </g>
                                                        </svg>
                                                    </label>
                                                    <p class="font-14 text-dark_2 font-medium">
                                                        {{ $str->title($str->replace('_', ' ', $groupName)) }}</p>
                                                </div>
                                            </div>
                                            <div class="lg:w-4/5 w-full px-4">
                                                <div class="row">
                                                    @foreach ($permissionLists as $permissionName => $routeList)
                                                        <div class="all-input md:w-1/4 px-4 mt-5 lg:mt-0 w-1/4">
                                                            @if (!empty($routeList))
                                                                <label
                                                                    class="mx-auto w-6 h-6  flex justify-center items-center cursor-pointer custom-input-checked rounded">
                                                                    <input
                                                                        name="roles[{{ $name }}][{{ $groupName }}][]"
                                                                        value="{{ $permissionName }}"
                                                                        {{ isset($role->permissions[$name][$groupName]) ? (in_array($permissionName, $role->permissions[$name][$groupName]) ? 'checked' : '') : '' }}
                                                                        class="hidden" type="checkbox">
                                                                        <svg class="checked-item h-5 w-5 rounded border-2 dark:border-lara-gray border-gray-400 text-transparent"
                                                                            viewBox="0 0 172 172">
                                                                            <g fill="none" font-family="none" font-size="none"
                                                                                font-weight="none" stroke-miterlimit="10"
                                                                                stroke-width="none" style="mix-blend-mode:normal"
                                                                                text-anchor="none">
                                                                                <path d="M0 172V0h172v172z"></path>
                                                                                <path
                                                                                    d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z"
                                                                                    fill="currentColor" stroke-width="2"></path>
                                                                            </g>
                                                                        </svg>
                                                                </label>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right">
                        <button
                            class="lara-submit-btn px-10 inline-block">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- role Permission end -->
    <x-section name="scripts">
        <script src="{{ Vite::js('role-permission.js') }}"></script>
        <script>
            let rolebutton = document.querySelectorAll('.rolebutton');
            let roleDrop = document.querySelectorAll('.roleDrop');
            let roleDropA = '';
            rolebutton.forEach(function(el, ind) {
                el.addEventListener('click', function() {
                    roleDrop.forEach(function(el2, in2) {
                        el2.classList.add('hidden');
                    })
                    roleDrop[ind].classList.remove('hidden')
                    if (roleDropA == roleDrop[ind]) {
                        roleDrop[ind].classList.add('hidden')
                    }
                    roleDropA = roleDrop[ind];
                    if (roleDrop[ind].classList.contains('hidden')) {
                        roleDropA = '';
                    }
                });
            });
        </script>
    </x-section>
</x-app-layout>
