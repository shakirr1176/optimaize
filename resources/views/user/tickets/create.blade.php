<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('tickets.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>

    <div class="bg-optm-gray-50 dark:bg-dark_2 rounded-xl sm:p-6 p-2 mt-4">
        <div class="max-width-custom mx-auto sm:my-5 item-center w-full md:w-1/2 sm:w-2/3 rounded-xl dark:bg-optm-gray-300 bg-optm-gray-50 sm:p-8 p-4">
            <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('user.tickets._create-form', ['buttonText' => __('Create')])
            </form>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('file-upload.js') }}"></script>
    </x-section>
</x-app-layout>
