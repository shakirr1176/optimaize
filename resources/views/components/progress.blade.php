@props([
    'percentage' => $percentage,
])

<div class="space-y-6">
    <div class="relative">
        <div class="bg-gray-100 w-full overflow-hidden bg-opacity-10 h-3 rounded-[999px]">
            <div {{ $attributes->merge(['class' => 'flex flex-col text-center whitespace-nowrap justify-center h-full progress-bar']) }} style="width: {{$percentage}};">
                {{$label}}
            </div>
        </div>
    </div>
</div>
