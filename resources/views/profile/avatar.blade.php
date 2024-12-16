<div class="w-full lg:w-1/4 px-4">
    <div class="rounded-lg h-full px-6 2xl:px-12 py-6 2xl:py-10">
        <form autocomplete="off" action="{{ route('profile.avatar.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="upload-image-parent w-full xl:w-auto px-3 flex items-center justify-center">
                <div
                    class="shrink-0 mx-auto xl:mx-0 w-40 h-40 2xl:w-56 2xl:h-56 rounded-full flex justify-center items-center dark:bg-lara-gray-100/50 bg-gray-300">
                    <div class="dark:bg-lara-gray-100 bg-gray-300 w-32 h-32 2xl:w-48 2xl:h-48 rounded-full border-2 border-white border-none relative group">
                        <div class="w-full h-full flex-col flex items-center justify-center text-center">
                            @if (!auth()->user()->avatar)
                                @svg('heroicon-s-camera', 'w-4 dark:text-white/70 text-dark_1')
                                <div class="font-semibold font-14 dark:text-white/70 text-dark_1 px-4 mt-2">
                                    {{ __('Upload New Avatar') }}
                                </div>
                            @else
                                <img class="rounded-full object-cover object-center w-full h-full"
                                    src="{{ auth()->user()->avatar }}" alt="">
                            @endif
                        </div>
                        <button type="button"
                            class="getImage hover:text-success flex items-center justify-center w-7 h-7 2xl:w-9 2xl:h-9 rounded-full shadow-md bg-white absolute bottom-0 -right-3 2xl:right-0 text-sm 2xl:text-lg text-black-80">
                            @svg('heroicon-s-camera', 'w-4 text-black-80')
                        </button>
                        <input name="avatar" class="getFile" type="file" onchange="form.submit()" hidden>
                        <img class="uploadImage rounded-full hidden w-full h-full object-cover object-center"
                            src="" alt="">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p class="text-sm text-red-600 mt-2">{{ $errors->first('avatar') }}</p>
            </div>
        </form>
    </div>
</div>
