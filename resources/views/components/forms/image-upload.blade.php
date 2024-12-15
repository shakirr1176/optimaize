<div class="group relative h-full">
    <div class="drop-area flex flex-col justify-center items-center rounded-full w-full h-full cursor-pointer">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
            <img src="" alt="" {{ $attributes->merge(['class' => 'mb-1']) }} name="{{ $name }}"
                type="{{ isset($type) ? $type : 'text' }}">
            <p class="my-2 font-14 text-gray-500 dark:text-gray-400 text-center font-medium ">
                <span class="text-2xl flex items-center justify-center">
                    <svg class="w-12" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                        width="24px" fill="#000000">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M18 20H4V6h9V4H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-9h-2v9zm-7.79-3.17l-1.96-2.36L5.5 18h11l-3.54-4.71zM20 4V1h-2v3h-3c.01.01 0 2 0 2h3v2.99c.01.01 2 0 2 0V6h3V4h-3z" />
                    </svg>
                </span>
            </p>
        </div>
        <div class="hidden w-32 h-24 flex items-center justify-center"></div>
    </div>
    <div
        class="shadow text-danger bg-gray-50 rounded-sm w-6 h-6 justify-center items-center hidden group-hover:flex absolute top-4 right-4 cursor-pointer">
        @svg('heroicon-m-trash', 'w-4 pointer-events-none')
    </div>
</div>
<input {{ $attributes->merge(['class' => 'uploadImgBtn']) }} type="{{ $type }}" hidden="">
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>
