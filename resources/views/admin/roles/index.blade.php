<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>Role Management</x-breadcrumb>
    </x-section>
    <x-datatable :data="$roles"></x-datatable>
    <!-- modal start  -->
    <x-modal class="addModal" title="{{ __('Create Role') }}">
        <x-slot name="inputs">
            @include('admin.roles._create-form')
        </x-slot>

        <x-slot name="button">
            <x-forms.button class="lara-submit-btn" type="submit" id="createSubmitBtn">
                @svg('heroicon-s-plus')
                {{ __('Create') }}
            </x-forms.button>
        </x-slot>
    </x-modal>

    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('table.js') }}"></script>
        <script src="{{ Vite::js('custom-crud.js') }}"></script>
        <script>
            let updateId;

            document.querySelector("#createSubmitBtn").addEventListener("click", function(e) {
                e.preventDefault();
                let form = document.querySelector(".addModal").children[0];
                let route = "{{ route('admin.roles.store') }}";
                let method = "POST";

                submit(route, form, method);
            });
        </script>
    </x-section>
</x-app-layout>
