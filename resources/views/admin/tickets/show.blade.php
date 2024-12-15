@php

    use App\Enums\TicketStatusEnum;
@endphp
<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>
            <x-slot name="above">
                <a href="{{ route('admin.tickets.index') }}"
                    class="w-fit mb-2 flex items-center gap-1.5 text-optm-purple font-16 hover:underline">
                    @svg('heroicon-o-chevron-left', 'w-3')
                    <span>{{ __('Back') }}</span>
                </a>
            </x-slot>
            {{ $title }}
        </x-breadcrumb>
    </x-section>
    <div class="bg-optm-gray-50 rounded-xl overflow-hidden">
        <div
            class="dark:bg-lara-darkBlack bg-optm-gray-300 py-2 2xl:py-4 px-6 flex flex-wrap items-center justify-between relative">
            <h3 class="font-18 text-dark_1 font-semibold">
                {{ __('Discussion') }}</h3>
            @if ($ticket->status == TicketStatusEnum::OPEN->value)

                <div class="flex items-center space-x-2">
                    @if (has_permission('admin.tickets.close'))
                        <a class="bg-danger hover:bg-opacity-90 text-white lara-btn confirmation"
                            data-form-method="put" data-alert="{{ 'Are you sure?' }}"
                            data-form-id="close-{{ $ticket->id }}"
                            href="{{ route('admin.tickets.close', ['ticket' => $ticket->id]) }}">
                            {{ __('Close Ticket') }}
                        </a>
                    @endif

                    @if (has_permission('admin.tickets.resolve'))
                        <a class="bg-lara-blue hover:bg-opacity-90 text-white lara-btn confirmation"
                            data-form-method="put" data-alert="{{ 'Are you sure?' }}"
                            data-form-id="resolve-{{ $ticket->id }}"
                            href="{{ route('admin.tickets.resolve', ['ticket' => $ticket->id]) }}">
                            {{ __('Resolve Ticket') }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
        <div class="2xl:px-6 2xl:py-6 lg:py-4 lg:px-6 py-2 px-6">
            <div>
                <ul class="flex flex-wrap items-center -mx-4">
                    <li class="flex flex-wrap items-center px-4 my-1">
                        <h5 class="dark:text-white text-dark_2 font-14 font-medium mr-4">
                            {{ __('Ticket ID') }} :</h5>
                        <p class=" dark:text-white text-dark_2 font-14">{{ $ticket->id }}</p>
                    </li>
                    @if (in_array($ticket->status, [TicketStatusEnum::RESOLVED->value, TicketStatusEnum::CLOSED->value]))
                        <li class="flex items-center px-4 my-1">
                            <h5 class="dark:text-white text-dark_2 font-14 font-medium mr-4">
                                {{ $ticket->status === TicketStatusEnum::RESOLVED->value ? __('Resolved By') : __('Closed By') }}
                                :</h5>
                            <p class=" font-14 dark:text-white text-dark_2">
                                {{ $ticket->assignedUser?->fullName }}</p>
                        </li>
                    @endif
                    <li class="flex items-center px-4 my-1">
                        <h5 class="dark:text-white text-dark_2 font-14 font-medium mr-4">
                            {{ __('Date') }} :</h5>
                        <p class=" font-14 dark:text-white text-dark_2">
                            {{ $ticket->created_at->toDateTimeString() }}</p>
                    </li>
                    <li class="flex items-center px-4 my-1">
                        <h5 class="dark:text-white text-dark_2 font-14 font-medium mr-4">
                            {{ __('Status') }} :</h5>
                        <p class=" font-14">{{ display_ticket_status($ticket->status) }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-6">
            <div class="flex flex-wrap -mx-3">
                <div class="px-3 md:w-[60px] w-10 mr-4">
                    <div class="mr-4 w-11 h-11 2xl:w-12 2xl:h-12 rounded-full overflow-hidden">
                        <img src="{{ get_avatar($ticket->user->avatar) }}" alt="avater">
                    </div>
                </div>
                <div class="flex-1 px-3">
                    <div class="flex items-center space-x-4 mt-3 md:mt-0">
                        <h4 class="font-18 dark:text-white text-dark_2">
                            {{ $ticket->user->fullName }}</h4>
                        <span
                            class="text-black-50 font-16">{{ $ticket->created_at !== null ? $ticket->created_at->diffForHumans() : '' }}</span>
                    </div>
                    <div class="mt-3">
                        <p class="capitalize font-14 dark:text-white text-dark_2 font-bold">
                            {{ $ticket->title }}</p>
                        <p class="capitalize font-14 dark:text-white text-dark_2 mt-1">
                            {{ $ticket->content }}</p>
                        @if ($ticket->attachment)
                            <a href="{{ route('admin.tickets.attachment.download', ['ticket' => $ticket->id, 'fileName' => $ticket->attachment]) }}"
                                class="mt-3">
                                <label>
                                    <span
                                        class="inline-flex items-center space-x-2 text-success cursor-pointer">
                                        @svg('heroicon-s-paper-clip', 'w-4')
                                        <span class="pt-1 text-sm tracking-wider">
                                            {{ __('Attached File') }}
                                        </span>
                                    </span>
                                </label>
                            </a>
                        @endif
                    </div>
                    @foreach ($ticket->comments as $comment)
                        <div class="flex flex-wrap -mx-1 mt-7 border-l-2 border-dashed ml-1.5">
                            <div class="px-1 ml-4 md:w-[60px] w-10">
                                <div class="mr-4 w-11 h-11 2xl:w-12 2xl:h-12 rounded-full overflow-hidden">
                                    <img src="{{ get_avatar($comment->user->avatar) }}" alt="avater">
                                </div>
                            </div>
                            <div class="flex-1 px-1 pl-4">
                                <div class="flex items-center space-x-4 mt-3 md:mt-0">
                                    <h4 class="font-18 dark:text-white text-dark_2 capitalize">
                                        {{ $comment->user->fullName }}</h4>
                                    <span
                                        class="text-black-50 font-16">{{ $comment->created_at !== null ? $comment->created_at->diffForHumans() : '' }}</span>
                                </div>
                                <div class="mt-3">
                                    <p class="capitalize font-14 dark:text-white text-dark_2">
                                        {{ $comment->content }}
                                    </p>
                                    @if ($comment->attachment)
                                        <a href="{{ route('admin.tickets.attachment.download', ['ticket' => $ticket->id, 'fileName' => $comment->attachment]) }}"
                                            class="mt-3">
                                            <label>
                                                <span
                                                    class="inline-flex items-center space-x-2 text-success cursor-pointer">
                                                    @svg('heroicon-s-paper-clip', 'w-4')
                                                    <span class="pt-1 text-sm tracking-wider">
                                                        {{ __('Attached File') }}
                                                    </span>
                                                </span>
                                            </label>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if (
                        !in_array($ticket->status, [TicketStatusEnum::RESOLVED->value, TicketStatusEnum::CLOSED->value]) &&
                            has_permission('admin.tickets.comment.store'))
                        <form action="{{ route('admin.tickets.comment.store', $ticket->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-wrap -mx-1 mt-7">
                                <div class="w-full px-1">
                                    <textarea rows="5"
                                        class="outline-none px-4 py-4 w-full font-16 text-black-50 dark:bg-lara-darkBlack bg-white border dark:border-gray-600 rounded-md"
                                        name="content" placeholder="{{ __('Type your message here...') }}"></textarea>
                                    <p class="text-sm text-red-600 mt-2">{{ $errors->first('content') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-1 mt-7">
                                <div class="w-full px-1 parentImgUploadDiv">
                                    <div class="group relative mt-4">
                                        <div
                                            class="drop-area flex flex-col justify-center items-center w-full h-32 border-2 dark:border-gray-600 border-gray-300 border-dashed cursor-pointer">
                                            <div
                                                class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <img src="" class="mb-1" alt="">
                                                <p
                                                    class="my-2 font-14 text-gray-500 dark:text-gray-400 text-center font-medium ">
                                                    <span class="text-2xl flex items-center justify-center">
                                                        @svg('heroicon-s-cloud-arrow-up', 'w-8')
                                                    </span>
                                                    <br>
                                                    {{ __('Drag and Drop here') }} <br>
                                                    {{ __('or') }} <br>
                                                    {{ 'Browse Files' }}
                                                </p>
                                            </div>
                                            <div class="hidden w-32"></div>
                                        </div>
                                        <div
                                            class="shadow text-danger bg-white rounded-sm w-5 h-5 justify-center items-center hidden group-hover:flex absolute top-2 right-2 cursor-pointer">
                                            @svg('heroicon-m-trash', 'w-5 pointer-events-none')
                                        </div>
                                    </div>
                                    <input class="uploadImgBtn" type="file" hidden=""
                                        name="attachment">
                                    <p class="text-sm text-red-600 mt-2">{{ $errors->first('attachment') }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full mt-7">
                                <div class="flex items-center space-x-3">
                                    <button class="bg-lara-blue hover:bg-opacity-90 text-white lara-btn"
                                        type="submit">
                                        {{ __('Submit') }}
                                    </button>
                                    <button class="bg-danger hover:bg-opacity-90 text-white lara-btn"
                                        type="reset">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="{{ Vite::js('file-upload.js') }}"></script>
    </x-section>
</x-app-layout>
