<x-app-layout>
    <x-section name="title">{{ __('Profile') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Profile') }}</x-breadcrumb>
    </x-section>
    <div class="mt-6 2xl:mt-10 rounded-lara-radious overflow-hidden bg-optm-gray-50 dark:bg-dark_2">
        <div id="edit-tab" class="flex font-16 font-semibold items-center">
            <button class="active tabButton duration-300 flex-1 min-w-[200px]">{{ __('Profile') }}</button>
            <button class="tabButton duration-300 flex-1 min-w-[200px]"> {{ __('Change Password') }}</button>
        </div>
        <div class="row">
            @include('profile.avatar')
            <div class="w-full lg:w-3/4 px-4">
                <!-- profile tab start -->
                <div id="edit-tab-content" class="p-6 2xl:p-10">
                    <div class="tab">
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                                <div>
                                    <x-forms.text id="first_name" name="first_name"
                                        value="{{ auth()->user()->first_name }}">

                                        <x-slot name="label">{{ __('First Name') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('first_name') }}</x-slot>
                                    </x-forms.text>
                                </div>
                                <div>
                                    <x-forms.text id="last_name" name="last_name"
                                        value="{{ auth()->user()->last_name }}">

                                        <x-slot name="label">{{ __('Last Name') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('last_name') }}</x-slot>
                                    </x-forms.text>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-4 gap-x-4 gap-y-2">
                                <button class="lara-cancel-btn dark:bg-danger/70 px-10" type="reset">
                                    {{ __('Reset') }}
                                </button>
                                <button class="lara-submit-btn px-10" type="submit">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- profile tab end -->

                    <!-- password tab start -->

                    <div class="tab">
                        <form action="{{ route('profile.update-password') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <x-forms.text id="current_password" name="current_password" type="password">

                                        <x-slot name="label">{{ __('Current Password') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('current_password') }}</x-slot>
                                    </x-forms.text>
                                </div>
                                <div>
                                    <x-forms.text id="new_password" name="new_password" type="password">

                                        <x-slot name="label">{{ __('New Password') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('new_password') }}</x-slot>
                                    </x-forms.text>
                                </div>
                                <div>
                                    <x-forms.text id="new_password_confirmation" name="new_password_confirmation"
                                        type="password">

                                        <x-slot name="label">{{ __('Confirm Password') }}</x-slot>
                                        <x-slot name="error">{{ $errors->first('new_password_confirmation') }}
                                        </x-slot>
                                    </x-forms.text>
                                </div>
                            </div>
                            <x-forms.button class="mt-4 lara-submit-btn px-10" type="submit">
                                {{ __('Update Password') }}
                            </x-forms.button>
                        </form>
                    </div>
                    <!-- password tab start -->
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('upload-image.js') }}"></script>
        <script src="{{ Vite::js('tab.js') }}"></script>
        <script>
            tabFunc('edit-tab');
        </script>
    </x-section>
</x-app-layout>
