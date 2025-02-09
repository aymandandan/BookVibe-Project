<x-app-layout>
    <div class="py-4 px-6 flex justify-center items-center">
        <div class="w-full max-w-7xl" x-data="{ book_type: '{{ $book->type }}' }">
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus
                        value="{{ $book->title }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" required
                        class="block mt-1 w-full h-32 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ trim($book->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Category')" />
                    <select name="category_id" id="category"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $book->category_id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Author -->
                <div class="mt-4">
                    <x-input-label for="author" :value="__('Author')" />
                    <select name="author_id" id="author"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @selected($author->id == $book->author_id)>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Page Number -->
                <div class="mt-4">
                    <x-input-label for="page_nb" :value="__('Page Number')" />
                    <x-text-input id="page_nb" class="block mt-1 w-full" type="number" min="0" name="page_nb"
                        value="{{ $book->page_nb }}" />
                    <x-input-error :messages="$errors->get('page_nb')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" min="0" step="0.01"
                        name="price" value="{{ number_format($book->price, 2) }}" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Cover Image -->
                <div class="mt-4">
                    <x-input-label for="cover_img" :value="__('Cover Image')" />
                    @if ($book->cover_img)
                        <div class="my-2">
                            <span class="text-sm text-gray-600">Current Cover:</span>
                            <img src="{{ asset($book->cover_img) }}" class="h-24 w-24 object-cover rounded">
                        </div>
                    @endif
                    <x-text-input id="cover_img" class="block mt-1 w-full" type="file" name="cover_img" />
                    <x-input-error :messages="$errors->get('cover_img')" class="mt-2" />
                </div>

                <!-- Publish Date -->
                <div class="mt-4">
                    <x-input-label for="publish_date" :value="__('Publish Date')" />
                    <x-text-input id="publish_date" class="block mt-1 w-full" type="date" name="publish_date"
                        value="{{ $book->publish_date }}" />
                    <x-input-error :messages="$errors->get('publish_date')" class="mt-2" />
                </div>

                <!-- Publisher -->
                <div class="mt-4">
                    <x-input-label for="publisher" :value="__('Publisher')" />
                    <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher"
                        value="{{ $book->publisher }}" />
                    <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                </div>

                <!-- Language -->
                <div class="mt-4">
                    <x-input-label for="language" :value="__('Language')" />
                    <x-text-input id="language" class="block mt-1 w-full" type="text" name="language"
                        value="{{ $book->language }}" />
                    <x-input-error :messages="$errors->get('language')" class="mt-2" />
                </div>

                <!-- Book Type -->
                <div class="mt-4">
                    <x-input-label :value="__('Book Type')" />
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="type-hard" type="radio" value="hard_book" x-model="book_type" name="type"
                                @checked($book->type === 'hard_book') />
                            <label for="type-hard" class="ml-2 text-sm text-gray-700">
                                {{ __('Hard Book') }}
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="type-ebook" type="radio" value="e_book" x-model="book_type" name="type"
                                @checked($book->type === 'e_book') />
                            <label for="type-ebook" class="ml-2 text-sm text-gray-700">
                                {{ __('eBook') }}
                            </label>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- Hard Book Fields -->
                <template x-if="book_type === 'hard_book'">
                    <div class="space-y-4 mt-4">
                        <div>
                            <x-input-label for="dimensions" :value="__('Dimensions')" />
                            <x-text-input id="dimensions" class="block mt-1 w-full" type="text" name="dimensions"
                                value="{{ $book->dimensions }}" />
                            <x-input-error :messages="$errors->get('dimensions')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stock_qty" :value="__('Stock Quantity')" />
                            <x-text-input id="stock_qty" class="block mt-1 w-full" type="number" min="0"
                                name="stock_qty" value="{{ $book->stock_qty }}" />
                            <x-input-error :messages="$errors->get('stock_qty')" class="mt-2" />
                        </div>
                    </div>
                </template>

                <!-- eBook File -->
                <template x-if="book_type === 'e_book'">
                    <div class="space-y-4 mt-4">
                        @if ($book->file_path)
                            <div class="my-2">
                                <span class="text-sm text-gray-600">Current File:</span>
                                <a href="{{ asset('storage/' . $book->file_path) }}"
                                    class="text-indigo-600 hover:underline" target="_blank">
                                    {{ basename($book->file_path) }}
                                </a>
                            </div>
                        @endif

                        <div>
                            <x-input-label for="size" :value="__('Size (MB)')" />
                            <x-text-input id="size" class="block mt-1 w-full" type="number" step="0.1"
                                name="size" value="{{ old('size', $book->size) }}" />
                            <x-input-error :messages="$errors->get('size')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="format" :value="__('Format')" />
                            <x-text-input id="format" class="block mt-1 w-full" type="text" name="format"
                                value="{{ old('format', $book->format) }}" placeholder="PDF, EPUB, etc." />
                            <x-input-error :messages="$errors->get('format')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="file_path" :value="__('File')" />
                            <x-text-input id="file_path" class="block mt-1 w-full" type="file"
                                name="file_path" />
                            <x-input-error :messages="$errors->get('file_path')" class="mt-2" />
                        </div>
                    </div>
                </template>

                <!-- Form Actions -->
                <div class="flex justify-evenly mt-8">
                    <a href="{{ route('book.show', $book) }}"
                        class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md transition-colors duration-150">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md text-white transition-colors duration-150">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
