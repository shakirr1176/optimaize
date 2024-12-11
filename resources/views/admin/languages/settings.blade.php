<x-app-layout>
    <x-section name="title">{{ $title }}</x-section>
    <x-section name="breadcrumb">
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
    </x-section>
    <div id="app">
        <div class=" w-full relative mt-4 2xl:mt-8">
            <div class="row justify-between">
                <div class="w-full sm:w-1/3 xl:w-1/3 px-4 py-2">
                    <form class="flex items-center">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer">
                                <svg aria-hidden="true" class="w-4 h-4 text-black-50" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input v-model="searchPhrase" @keyup="searchTranslations" type="text"
                                class="lara-input-search dark:bg-lara-darkBlack bg-white rounded-full" id="simple-search" placeholder="{{ __('Search') }}" required>
                        </div>
                    </form>
                </div>
                <div class="px-4 py-2 w-full sm:w-auto">
                    <div class="flex justify-end space-x-1">
                        <div class="w-auto">
                            <button @click="sync"
                                class="lara-btn font-semibold bg-lara-blue text-white hover:bg-opacity-90">
                                <span class="px-6">
                                    {{ __('Sync') }}
                                </span>
                            </button>
                        </div>
                        <div class="w-32">
                            <div class="relative w-full flex items-center">
                                @svg('heroicon-s-chevron-down', 'w-4 text-black-50 absolute pointer-events-none right-5')
                                <div class="flex items-center overflow-hidden h-full cursor-pointer lara-btn text-black-50 dark:bg-lara-darkBlack bg-white border-none w-full uppercase"
                                    @click="isOpen = !isOpen">@{{ selectedLanguage }}</div>
                                <div v-if="isOpen"
                                    class="absolute z-40 rounded-xl mt-1.5 overflow-hidden top-full w-full">
                                    <div class="w-full font-14 px-4 2xl:px-6 py-2 2xl:py-2.5 uppercase cursor-pointer hover:bg-primary hover:text-white"
                                        v-for="language in languages" @click="changeLanguage(language)"
                                        :data-value="language"
                                        :class="language == selectedLanguage ? 'bg-primary text-white' :
                                            'dark:bg-lara-primary bg-white text-black-50'">
                                        @{{ language }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full dark:bg-lara-whiteGray bg-white p-6 2xl:p-12 mt-4 2xl:mt-8">
            <div class="row items-center">
                <div class="lg:w-1/2 w-full px-4 3xl:mt-0">
                    <div class="wrapper w-full mt-8">
                        <div id="scrollParent"
                            class="hide-scrollbar pl-4 customScroll-none h-96 w-full relative overflow-auto">
                            <div class="parent w-full">
                                <div class="py-4 2xl:py-6 cursor-pointer dark:hover:bg-lara-primary hover:bg-gray-100 p-3 font-14"
                                    v-for="(value, key) in filteredTranslations" @click="selectedKey = key;"
                                    v-if="Object.keys(filteredTranslations).length">
                                    <p class="text-black-50" v-html="highlight(key)"></p>
                                    <p class="text-black-80" v-html="highlight(value)"></p>
                                </div>
                                <div class="py-4 2xl:py-6 cursor-pointer hover:bg-lara-primary p-3 font-14" v-else>
                                    <p class="text-black-50">{{ __('No translation match with your search key.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full px-4 lg:mt-0 mt-8" v-if="selectedKey">
                    <div>
                        <label class="lara-label" for="">{{ __('Key') }}</label>
                        <p class="text-black-80 font-16" v-html="highlight(selectedKey)"></p>
                    </div>
                    <div class="mt-4 2xl:mt-6">
                        <label class="lara-label" for="Text">{{ __('Text') }}</label>
                        <textarea class="lara-input dark:bg-lara-primary bg-white dark:border-none" name="" cols="30" rows="10"
                            v-model="translations[selectedLanguage][selectedKey]" @keyup="changeTranslations(selectedKey, $event)">
                    </textarea>
                    </div>
                    <p class="mt-4 text-warning font-16">
                        {{ __('NB: Do not modify language variable that start with (:) ie- :user') }}
                    </p>
                    <div class="w-full sm:w-1/3 mt-6 2xl:mt-8">
                        <button class="lara-btn font-semibold text-white bg-lara-blue hover:bg-opacity-90"
                            @click="save">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full px-4 lg:mt-0 mt-8" v-else>
                    <p class="text-black-80 font-16 px-4 mt-10">
                        {{ __('Select a key from the list to the left') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <x-section name="scripts">
        <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
        <script src="{{ Vite::js('language-setting.js') }}"></script>
        <script>
            const data = {
                languages: @json(language_short_code_list()),
                selectedLanguage: '{{ app()->getLocale() }}'.toLowerCase(),
                routes: {
                    getTranslations: '{{ route('admin.languages.translations') }}',
                    update: '{{ route('admin.languages.update.settings') }}',
                    sync: '{{ route('admin.languages.sync') }}'
                }
            };
        </script>
        <script>
            const {
                createApp
            } = Vue
            const app = createApp({
                data() {
                    return {
                        languages: data.languages,
                        selectedLanguage: data.selectedLanguage,
                        searchPhrase: '',
                        selectedKey: null,
                        translations: [],
                        filteredTranslations: [],
                        confirmDialog: false,
                        isOpen: false,
                    }
                },
                methods: {
                    highlight(value) {
                        if (!value) {
                            return;
                        }
                        return value.replace(/:{1}[\w-]+/gi, function(match) {
                            return '<mark>' + match + '</mark>';
                        });
                    },
                    changeLanguage(language) {
                        this.selectedLanguage = language;
                        this.filteredTranslations = this.translations[language];
                        this.searchPhrase = '';
                        this.selectedKey = null;
                        this.isOpen = false;
                    },
                    save() {
                        let request = {
                            translations: this.translations
                        };
                        axios.put(data.routes.update, request).then(response => {
                            flashBox(response.data.type, response.data.message);
                        });
                    },
                    getTranslations() {
                        axios.get(data.routes.getTranslations).then(response => {
                            this.translations = response.data;
                            this.filteredTranslations = this.translations[this.selectedLanguage];
                        });
                    },
                    changeTranslations(key, event) {
                        this.translations[this.selectedLanguage][key] = event.target.value;
                        this.filteredTranslations[key] = event.target.value;
                    },
                    searchTranslations() {
                        let filteredTranslations = {};
                        if (this.searchPhrase.length > 0) {
                            _.forEach(this.filteredTranslations, (value, translation) => {
                                if (translation && translation.toString().trim().toLowerCase().includes(this
                                        .searchPhrase.trim().toLowerCase())) {
                                    filteredTranslations[translation] = this.filteredTranslations[translation];
                                }
                            });
                            this.filteredTranslations = filteredTranslations;
                        } else {
                            this.filteredTranslations = this.translations[this.selectedLanguage];
                        }
                    },
                    sync() {
                        axios.put(data.routes.sync).then(response => {
                            flashBox(response.data.type, response.data.message);
                            this.translations = response.data.translations;
                            this.filteredTranslations = this.translations[this.selectedLanguage];
                        });
                    },
                },
                mounted() {
                    this.getTranslations();
                },
            });
            app.mount('#app')
        </script>
    </x-section>
</x-app-layout>
