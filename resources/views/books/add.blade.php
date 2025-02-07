<x-app-layout>
    <div class="py-4 px-6 flex justify-center items-center">
        <div class="w-full max-w-7xl" x-data="{ book_type: 'hard_book' }">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required
                        autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" required
                        class="block mt-1 w-full h-32 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        type="text" name="description"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="category" :value="__('Category')" />
                    <select name="category_id"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="author" :value="__('Author')" />
                    <select name="author_id"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="page_nb" :value="__('Page Numeber')" />
                    <x-text-input id="page_nb" class="block mt-1 w-full" type="number" min="0"
                        name="page_nb" />
                    <x-input-error :messages="$errors->get('page_nb')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" min="0"
                        name="price" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="cover_img" :value="__('Cover Image')" />
                    <x-text-input id="cover_img" class="block mt-1 w-full" type="file" name="cover_img" autofocus />
                    <x-input-error :messages="$errors->get('cover_img')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="publish_date" :value="__('Publish Date')" />
                    <x-text-input id="publish_date" class="block mt-1 w-full" type="date" name="publish_date"
                        autofocus />
                    <x-input-error :messages="$errors->get('publish_date')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="publisher" :value="__('Publisher')" />
                    <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" autofocus />
                    <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="language" :value="__('Language')" />
                    <x-text-input id="language" class="block mt-1 w-full" type="text" name="language" autofocus />
                    <x-input-error :messages="$errors->get('language')" class="mt-2" />
                </div>

                <div class="my-2">
                    <x-input-label :value="__('Book Type')" />
                    <div>
                        <input id="type" class="mt-1" type="radio" value="hard_book" checked
                            @click="book_type = 'hard_book'" name="type" />
                        <label class="text-sm text-grey-900 h-full text-center">
                            {{ __('Hard Book') }}
                        </label>
                    </div>
                    <div>
                        <input id="type" class="mt-1" type="radio" value="e_book" @click="book_type = 'e_book'"
                            name="type" />
                        <label class="text-sm text-grey-900 h-full text-center">
                            {{ __('eBook') }}
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <div :class="{ 'hidden': book_type != 'hard_book' }">
                    <x-input-label for="dimensions" :value="__('Dimensions')" />
                    <x-text-input id="dimensions" class="block mt-1 w-full" type="text" name="dimensions"
                        autofocus />
                    <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                </div>

                <div :class="{ 'hidden': book_type != 'hard_book' }">
                    <x-input-label for="stock_qty" :value="__('Stock Quantity')" />
                    <x-text-input id="stock_qty" class="block mt-1 w-full" type="number" min="0"
                        name="stock_qty" autofocus />
                    <x-input-error :messages="$errors->get('stock_qty')" class="mt-2" />
                </div>

                <div :class="{ 'hidden': book_type != 'e_book' }">
                    <x-input-label for="size" :value="__('Size in MB')" />
                    <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" autofocus />
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />
                </div>

                <div :class="{ 'hidden': book_type != 'e_book' }">
                    <x-input-label for="format" :value="__('Format (.pdf, .docx, ...)')" />
                    <x-text-input id="format" class="block mt-1 w-full" type="text" name="format"
                        autofocus />
                    <x-input-error :messages="$errors->get('format')" class="mt-2" />
                </div>

                <div :class="{ 'hidden': book_type != 'e_book' }">
                    <x-input-label for="file" :value="__('File')" />
                    <x-text-input id="file" class="block mt-1 w-full" type="file" name="file_path"
                        autofocus />
                    <x-input-error :messages="$errors->get('file_path')" class="mt-2" />
                </div>

                <div class="flex justify-around mt-4">
                    <a href="{{ url()->previous() }}"
                        class="bg-indigo-200 rounded p-2 shadow hover:bg-indigo-300 transition duration-150 ease-in-out">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                        class="bg-cyan-600 rounded p-2 shadow hover:bg-cyan-700 text-white transition duration-150 ease-in-out">
                        {{ __('Add Book') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
