<label class="lara-label" for="">{{ $label }}</label>
<div class="group relative">
    <div class="drop-area flex flex-col justify-center items-center w-full h-32 dark:border-lara-whiteGray border-gray-400 border-2 border-dashed cursor-pointer">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
            <img src="" alt="" {{ $attributes->merge(['class' => 'mb-1']) }}
                name="{{ $name }}"
                type="{{ isset($type) ? $type : 'text'}}">
            <p class="my-2 font-14 text-gray-500 dark:text-gray-400 text-center font-medium ">
                <span class="text-2xl flex items-center justify-center">
                    @svg('heroicon-s-cloud-arrow-up', 'w-8')
                </span>
                <br>
                {{ __("Drag and Drop here") }}<br>
                {{ __("or") }} <br>
                {{ __("Browse Files") }}
        </p></div>
        <div class="hidden w-32 h-24 flex items-center justify-center"></div>
    </div>
    <div class="shadow text-danger bg-white rounded-sm w-5 h-5 justify-center items-center hidden group-hover:flex absolute top-2 right-2 cursor-pointer">
        @svg('heroicon-m-trash', 'w-4 pointer-events-none')
    </div>
</div>
<input {{ $attributes->merge(['class' => 'uploadImgBtn']) }} type="{{ $type }}" hidden="">
@if (isset($error))
<p class="error-message">{{ $error }}</p>
@endif
