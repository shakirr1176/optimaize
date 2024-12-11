@php
    use App\Enums\ResponseTypeEnum;
@endphp
@if (session(ResponseTypeEnum::ERROR->value))
    <x-alert type="error" class="mb-7">
        {{ session(ResponseTypeEnum::ERROR->value) }}
    </x-alert>
@endif

@if (session(ResponseTypeEnum::SUCCESS->value))
    <x-alert type="success" class="mb-7">
        {{ session(ResponseTypeEnum::SUCCESS->value) }}
    </x-alert>
@endif

@if (session(ResponseTypeEnum::WARNING->value))
    <x-alert type="warning" class="mb-7">
        {{ session(ResponseTypeEnum::WARNING->value) }}
    </x-alert>
@endif
