@extends('layouts.admin')

@section('content')
    <div x-data="{ bookType: '{{ old('type', $book->type ?? 'hard_book') }}' }" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold text-primary-500 mb-6">{{ isset($book) ? 'Edit' : 'Add' }} Book</h2>

        <form action="{{ isset($book) ? route('admin.books.update', $book->id) : route('admin.books.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @isset($book)
                @method('PUT')
            @endisset

            <!-- Book Type Toggle -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Book Type</label>
                <select name="type" x-model="bookType"
                    class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    <option value="hard_book">Physical Book</option>
                    <option value="e_book">E-Book</option>
                </select>
                @error('type')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Common Fields -->
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Title -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Category Select -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Author Select -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Author</label>
                    <select name="author_id"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id ?? '') == $author->id)>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $book->price ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Page Numbers -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Page Numbers</label>
                    <input type="number" name="page_nb" value="{{ old('page_nb', $book->page_nb ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('page_nb')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Publisher -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Publisher</label>
                    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('publisher')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Language -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Language</label>
                    <input type="text" name="language" value="{{ old('language', $book->language ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('language')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Publish Date -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Publish Date</label>
                    <input type="date" name="publish_date" value="{{ old('publish_date', $book->publish_date ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('publish_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Physical Book Fields -->
            <div x-show="bookType === 'hard_book'" class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Dimensions</label>
                    <input type="text" name="dimensions" value="{{ old('dimensions', $book->dimensions ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        x-bind:required="bookType === 'hard_book'">
                    @error('dimensions')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Stock Quantity</label>
                    <input type="number" name="stock_qty" value="{{ old('stock_qty', $book->stock_qty ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        x-bind:required="bookType === 'hard_book'">
                    @error('stock_qty')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- E-Book Fields -->
            <div x-show="bookType === 'e_book'" class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">File Size (MB)</label>
                    <input type="number" step="0.1" name="size" value="{{ old('size', $book->size ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        x-bind:required="bookType === 'e_book'">
                    @error('size')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Format</label>
                    <input type="text" name="format" value="{{ old('format', $book->format ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        x-bind:required="bookType === 'e_book'">
                    @error('format')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-700">E-Book File</label>
                    <input type="file" name="file_path"
                        class="w-full rounded border-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-primary-500 file:text-white hover:file:bg-primary-600"
                        accept="application/pdf,application/epub+zip"
                        x-bind:required="bookType === 'e_book' && !{{ isset($book->file_path) ? 'true' : 'false' }}">
                    @if (isset($book->file_path))
                        <div class="mt-2 text-sm text-gray-600">
                            Current file: {{ basename($book->file_path) }}
                            <label class="ml-4"><input type="checkbox" name="remove_file"> Remove file</label>
                        </div>
                    @endif
                    @error('file_path')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Common File Upload -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Cover Image</label>
                <input type="file" name="cover_img"
                    class="w-full rounded border-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-primary-500 file:text-white hover:file:bg-primary-600">
                @if (isset($book->cover_img))
                    <div class="mt-2">
                        <img src="{{ asset($book->cover_img) }}" class="h-20 w-auto" alt="Current cover">
                        <label class="ml-4"><input type="checkbox" name="remove_cover"> Remove cover image</label>
                    </div>
                @endif
                @error('cover_img')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description', $book->description ?? '') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.books.index') }}"
                    class="w-auto px-4 py-2 bg-grey-500 text-white rounded-lg hover:bg-grey-600 transition-colors flex items-center justify-center gap-2">Cancel</a>
                <button type="submit"
                    class="w-auto px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors flex items-center justify-center gap-2">Save
                    Book</button>
            </div>
        </form>
    </div>
@endsection
