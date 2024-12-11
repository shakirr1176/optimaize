<x-app-layout>
    <x-section name="title">{{ __('Profile') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Profile') }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10">
        <div class="row">
            @include('profile.avatar')
            <div class="w-full px-4 xl:w-2/3 pb-0">
                <div class="w-full h-full rounded-lg dark:bg-lara-darkBlack bg-white p-6 2xl:p-10">
                    <div class="sm:border-b dark:border-lara-primary border-gray-200">
                        <div id="edit-tab" class="flex flex-wrap -mx-0.5 justify-between space-y-2 sm:space-y-0">
                            <div class="w-full sm:w-1/2 px-0.5">
                                <a href="javascript:"
                                    class="tabButton active font-14 px-4 2xl:px-6 py-2 2xl:py-2.5 block text-center hover:bg-lara-blue hover:text-white font-semibold">
                                    {{ __('Profile') }}
                                </a>
                            </div>
                            <div class="w-full sm:w-1/2 px-0.5">
                                <a href="javascript:"
                                    class="tabButton font-14 px-4 2xl:px-6 py-2 2xl:py-2.5 block text-center hover:bg-lara-blue text-black-80 hover:text-white font-semibold">
                                    {{ __('Change Password') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- profile tab start -->

                    <div id="edit-tab-content">
                        <div class="mt-6 tab">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="rounded-t-md row">
                                    <div class="md:w-1/2 w-full px-4 mt-4 2xl:mt-6">
                                        <x-forms.text id="first_name" name="first_name"
                                            value="{{ auth()->user()->first_name }}">

                                            <x-slot name="label">{{ __('First Name') }}</x-slot>
                                            <x-slot name="error">{{ $errors->first('first_name') }}</x-slot>
                                        </x-forms.text>
                                    </div>
                                    <div class="md:w-1/2 w-full px-4 mt-4 2xl:mt-6">
                                        <x-forms.text id="last_name" name="last_name"
                                            value="{{ auth()->user()->last_name }}">

                                            <x-slot name="label">{{ __('Last Name') }}</x-slot>
                                            <x-slot name="error">{{ $errors->first('last_name') }}</x-slot>
                                        </x-forms.text>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-2 xl:w-2/3 mt-6 2xl:mt-8">
                                    <div class="w-full md:w-1/2 px-2">
                                        <x-forms.button class="w-full bg-lara-blue" type="submit">
                                            {{ __('Update') }}
                                        </x-forms.button>
                                    </div>
                                    <div class="w-full md:w-1/2 px-2 mt-4 md:mt-0">
                                        <x-forms.button class="w-full bg-danger" type="reset">
                                            {{ __('Reset') }}
                                        </x-forms.button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- profile tab end -->

                        <!-- password tab start -->

                        <div class="mt-6 tab">
                            <form action="{{ route('profile.update-password') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="rounded-t-md row">
                                    <div class="w-full  pr-4 sm:pr-0 pl-4 mt-4 2xl:mt-6">
                                        <x-forms.text id="current_password" name="current_password" type="password">

                                            <x-slot name="label">{{ __('Current Password') }}</x-slot>
                                            <x-slot name="error">{{ $errors->first('current_password') }}</x-slot>
                                        </x-forms.text>
                                    </div>
                                    <div class="w-full pr-4 sm:pr-0 pl-4 mt-4 2xl:mt-6">
                                        <x-forms.text id="new_password" name="new_password" type="password">

                                            <x-slot name="label">{{ __('New Password') }}</x-slot>
                                            <x-slot name="error">{{ $errors->first('new_password') }}</x-slot>
                                        </x-forms.text>
                                    </div>
                                    <div class="w-full pr-4 sm:pr-0 pl-4 mt-4 2xl:mt-6">
                                        <x-forms.text id="new_password_confirmation" name="new_password_confirmation"
                                            type="password">

                                            <x-slot name="label">{{ __('Confirm Password') }}</x-slot>
                                            <x-slot name="error">{{ $errors->first('new_password_confirmation') }}
                                            </x-slot>
                                        </x-forms.text>
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/3 mt-6 2xl:mt-8">
                                    <x-forms.button class="w-full bg-lara-blue" type="submit">
                                        {{ __('Update Password') }}
                                    </x-forms.button>
                                </div>
                            </form>
                        </div>
                        <!-- password tab start -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('upload-image.js') }}"></script>
        <script src="{{ Vite::js('tab.js') }}"></script>
    </x-section>
</x-app-layout>
