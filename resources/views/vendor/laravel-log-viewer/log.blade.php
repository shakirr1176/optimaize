@php use Illuminate\Support\Facades\Crypt; @endphp
<x-app-layout>
    <x-section name="title">{{ __('Log') }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ __('Log') }}</x-breadcrumb>
    </x-section>
    <div class="w-full relative mt-4 2xl:mt-8">
        <div class="row items-center justify-between mb-4">
            <div class="w-full sm:w-1/3 px-4 py-2">
                <div class="w-full flex items-center dark:bg-lara-whiteGray bg-white rounded-xl border dark:border-none">
                    <div class="w-24 pl-4 text-black-50 whitespace-nowrap font-16">{{ __('Logs of') }} :</div>
                    <div class="w-full overflow-hidden text-ellipsis relative flex-auto">
                        @svg('heroicon-s-chevron-down', 'w-4 text-black-80 dark:text-white absolute pointer-events-none top-1/2 -translate-y-1/2 right-4')
                        <select name="file"
                            class="file pr-8 overflow-hidden text-ellipsis font-16 text-black-80 appearance-none bg-transparent w-full py-1.5 outline-none px-4">
                            @foreach ($files as $file)
                                <option class="bg-lara-primary" {{ $current_file == $file ? 'selected' : '' }}
                                    value="?l={{ Crypt::encrypt($file) }}"> {{ $file }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @if ($current_file)
                <div class="px-4 py-2 w-full sm:w-auto">
                    <div class="flex flex-wrap sm:justify-end gap-1 items-center">
                        <div class="w-auto">
                            <a href="?dl={{ Crypt::encrypt($current_file) }}"
                                class="lara-btn px-4 py-1.5 flex items-center font-medium bg-lara-blue text-white hover:text-white border dark:border-none duration-300 hover:bg-opacity-90">
                                @svg('heroicon-s-folder-arrow-down', 'w-4 mb-0.5 mr-1')
                                {{ __('Download') }}
                            </a>
                        </div>
                        <div class="w-auto">
                            <a href="?del={{ Crypt::encrypt($current_file) }}" id="delete-log" data-form-method="GET"
                                data-alert="{{ __('Are you sure?') }}"
                                class="confirmation lara-btn px-4 py-1.5 flex items-center font-medium bg-lara-blue text-white hover:text-white border dark:border-none duration-300 hover:bg-opacity-90">
                                @svg('heroicon-m-trash', 'w-4 mb-0.5 mr-0.5')
                                {{ __('Delete Current File') }}
                            </a>
                        </div>
                        @if (count($files) > 1)
                            <div class="w-auto">
                                <a href="?delall=true"
                                    class="confirmation lara-btn px-4 py-1.5 flex items-center font-medium bg-lara-blue text-white hover:text-white border dark:border-none duration-300 hover:bg-opacity-90"
                                    id="delete-all-log" data-form-method="GET" data-alert="{{ __('Are you sure?') }}">
                                    @svg('heroicon-m-trash', 'w-4 mb-0.5 mr-0.5')
                                    {{ __('Delete All Files') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="w-full 2xl:mt-4">
        <!-- table start -->
        <div class="w-full overflow-x-scroll customScrollX dark:bg-lara-darkBlack bg-white p-6">
            <table class="border-spacing-y-1.5 border-separate w-full whitespace-nowrap" id="dataTable">
                <thead>
                    <tr class="text-left font-14 text-black-50 whitespace-nowrap">
                        <th class="sortClass cursor-pointer my-3 2xl:py-4 py-3.5 font-medium capitalize pr-6 pl-10">
                            <div class="flex items-center justify-between">
                                <span>{{ __('Level') }}</span>
                                <div class="tableArrow flex flex-col justify-center pl-6">
                                    @svg('heroicon-s-chevron-up', 'w-3 transform translate-y-0.5')
                                    @svg('heroicon-s-chevron-down', 'w-3 transform translate-y-0.5')
                                </div>
                            </div>
                        </th>
                        <th class="sortClass cursor-pointer 2xl:py-4 py-3.5 font-medium capitalize px-6">
                            <div class="flex items-center justify-between">
                                <span>{{ __('Date') }}</span>
                                <div class="tableArrow flex flex-col justify-center pl-6">
                                    @svg('heroicon-s-chevron-up', 'w-3 transform translate-y-0.5')
                                    @svg('heroicon-s-chevron-down', 'w-3 transform translate-y-0.5')
                                </div>
                            </div>
                        </th>
                        <th class="sortClass cursor-pointer 2xl:py-4 py-3.5 font-medium capitalize px-6">
                            {{ __('Content') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="dark:text-white text-lara-whiteGray">
                    @forelse($logs as $key => $log)
                        <tr class="mt-4 font-14 font-medium">
                            <td class="rounded-xl dark:bg-lara-whiteGray bg-light-table-row text-left 2xl:py-4 py-3.5">
                                <div class="flex">
                                    <div class="w-10 flex justify-center">
                                        <button class="tableDropBtn text-primary">
                                            @svg('heroicon-s-plus', 'w-5')
                                            @svg('heroicon-s-minus', 'w-5 hidden')
                                        </button>
                                    </div>
                                    <p>
                                        @svg(get_heroicon_name($log['level_img']), 'w-5 inline-block')&nbsp;
                                        {{ $log['level'] }}
                                    </p>
                                </div>
                                <div class="hidden">
                                    <div class="px-6 py-5 font-14 dark:bg-lara-whiteGray bg-light-table-row rounded-xl">
                                        <div>
                                            <p class="font-semibold">{{ __('Details') }} :</p>
                                            {{ $log['text'] }}
                                            @if (isset($log['in_file']))
                                                <br />{{ $log['in_file'] }}
                                            @endif
                                        </div>
                                        <div class="mt-4">
                                            <p class="font-semibold">{{ __('Stack') }} :</p>
                                            @if ($log['stack'])
                                                <p>{{ trim($log['stack']) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 text-left dark:bg-lara-whiteGray bg-light-table-row">{{ $log['date'] }}</td>
                            <td class="px-6 text-left dark:bg-lara-whiteGray bg-light-table-row"><span
                                    class="text-Info px-6 capitalize max-w-[500px] 2xl:max-w-[700px] overflow-hidden text-ellipsis block">{{ substr($log['text'], 0, 80) }} . . .</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>{{ __('Log file > 50M, please download it.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- table end -->
    </div>

    <x-section name="style">
        <link href="{{ Vite::css('datatable.css') }}" rel="stylesheet" type="text/css">
    </x-section>

    <x-section name="scripts">
        <script src="{{ asset('js/datatable.js') }}" type="text/javascript"></script>
        <script>
            new simpleDatatables.DataTable("#dataTable", {
                searchable: true,
                fixedHeight: false,
            });

            let file = document.querySelector('.file');
            let logUrl = "{{ route('admin.logs.index') }}";
            file.addEventListener('change', function() {
                window.location = logUrl + file.value;
            });
        </script>
        <script>
            document.addEventListener('click', function(e) {
                let row = e.target.closest('tr');
                let expandButton = e.target.closest('.tableDropBtn');
                if (expandButton) {
                    let newRow;
                    expandButton.parentElement.classList.toggle('a');
                    expandButton.children[0].classList.toggle('hidden');
                    expandButton.children[1].classList.toggle('hidden');
                    expandButton.classList.toggle('text-primary');
                    expandButton.classList.toggle('text-danger');
                    newRow = document.createElement('tr');
                    newRow.classList.add('whitespace-normal', 'tableData');
                    if (expandButton.parentElement.classList.contains('a')) {
                        let tableClosest = expandButton.closest('td');
                        newRow.innerHTML = '<td>' + row.children[0].children[1].innerHTML + '</td>';
                        tableClosest.parentElement.insertAdjacentElement("afterEnd", newRow);
                        newRow.children[0].setAttribute('colspan', expandButton.closest('tr').children.length);
                    } else {
                        expandButton.closest('tr').nextElementSibling.remove();
                    }
                }
            });
        </script>
    </x-section>
</x-app-layout>
