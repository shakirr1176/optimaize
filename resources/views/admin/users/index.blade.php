<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>

    <x-datatable :data="$users"></x-datatable>

    <!-- modal start  -->
    <x-modal class="addModal" title="{{ __('Create User') }}">
        <x-slot name="inputs">
            @include('admin.users._create-form')
        </x-slot>

        <x-slot name="button">
            <div class="px-2 w-full sm:w-1/2 mt-6 sm:mt-0">
                <x-forms.button class="w-full bg-lara-blue font-semibold" type="submit" id="createSubmitBtn">
                    {{ __('Create') }}
                </x-forms.button>
            </div>
        </x-slot>
    </x-modal>

    <x-modal class="editModal" title="{{ __('Update User') }}">
        <x-slot name="inputs">
            @include('admin.users._update-form')
        </x-slot>

        <x-slot name="button">
            <div class="px-2 w-full sm:w-1/2 mt-6 sm:mt-0">
                <x-forms.button class="w-full bg-lara-blue font-semibold" type="submit" id="updateSubmitBtn">
                    {{ __('Update') }}
                </x-forms.button>
            </div>
        </x-slot>
    </x-modal>
    <!-- modal end  -->

    <x-section name="scripts">
        <script src="{{ Vite::js('select-drop-down.js') }}"></script>
        <script src="{{ Vite::js('table.js') }}"></script>
        <script src="{{ Vite::js('crud-process.js') }}"></script>
        <script>
            let updateId;

            document.querySelector("#createSubmitBtn").addEventListener("click", function(e) {
                e.preventDefault();
                let form = document.querySelector(".addModal").children[0];
                let route = "{{ route('admin.users.store') }}";
                let method = "POST";

                submit(route, form, method);
            });

            window.addEventListener("click", (e) => {
                if (e.target.classList.contains("editModalButton")) {
                    updateId = e.target.getAttribute("data-form-id");
                    let route = e.target.getAttribute("href");
                    let form = document.querySelector(".editModal").children[0];
                    let data = fetchData(route, form);
                }
            });

            document.querySelector("#updateSubmitBtn").addEventListener("click", function(e) {
                e.preventDefault();
                let form = document.querySelector(".editModal").children[0];
                let route = "{{ route('admin.users.update', ':updateId') }}".replace(":updateId", updateId);
                let method = "PUT";

                submit(route, form, method);
            });
        </script>
    </x-section>
</x-app-layout>
