<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">

                    <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">

                        @csrf

                        <x-input-label for="image" :value="__('Image')" />
                        <input name="image"
                            class="mt-4 mb-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />


                        <!-- Category -->
                        <div class="m-4">
                            <x-input-label for="tittle" :value="__('Category')" />
                            <select name="category_id">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name}}</option>

                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tittle')" class="mt-2" />
                        </div>
                        <!-- Tittle -->
                        <div>
                            <x-input-label for="tittle" :value="__('Tittle')" />
                            <x-text-input id="tittle" class="block mt-1 w-full" type="text" name="tittle"
                                :value="old('tittle')" required autofocus />
                            <x-input-error :messages="$errors->get('tittle')" class="mt-2" />
                        </div>
                        <!-- Content -->
                        <div class="mt-6">
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-inputarea id="content" class="block mt-1 w-full" type="text" name="content"
                                :value="old('content')" required>
                            </x-text-inputarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4" type="Submit">Submit</x-primary-button>
                    </form>
                </div>


            </div>
        </div>

    </div>


</x-app-layout>