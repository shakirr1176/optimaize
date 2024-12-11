<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>

    <div class="dark:bg-lara-darkBlack bg-white rounded-xl sm:p-6 p-2 mt-4">
        <div class="max-width-custom mx-auto sm:my-5 item-center w-full md:w-1/2 sm:w-2/3 rounded-xl dark:bg-lara-darkBlack bg-white sm:p-8 p-4">
            <div class="row">
                <div class="px-4">
                    <div class="lf-bg-grey-light card-body">
                        <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('user.tickets._create-form', ['buttonText' => __('Create')])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('file-upload.js') }}"></script>
    </x-section>
</x-app-layout>
