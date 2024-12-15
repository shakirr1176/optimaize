<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>

    <x-datatable :data="$tickets"></x-datatable>

    <x-section name="scripts">
        <script src="{{ Vite::js('file-upload.js') }}"></script>
    </x-section>
</x-app-layout>
