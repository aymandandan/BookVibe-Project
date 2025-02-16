@extends('layouts.admin')

@section('title', isset($author) ? 'Edit Author' : 'Create Author')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold text-primary-500 mb-6">
            {{ isset($author) ? 'Edit Author' : 'Create New Author' }}
        </h2>

        <form action="{{ isset($author) ? route('admin.authors.update', $author) : route('admin.authors.store') }}"
            method="POST">
            @csrf
            @isset($author)
                @method('PUT')
            @endisset

            <div class="grid gap-6 mb-6">
                <!-- Name Field -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Author Name</label>
                    <input type="text" name="name" value="{{ old('name', $author->name ?? '') }}"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- About Field -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">About the Author</label>
                    <textarea name="about" rows="4"
                        class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('about', $author->about ?? '') }}</textarea>
                    @error('about')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.authors.index') }}"
                    class="w-auto px-4 py-2 bg-grey-500 text-white rounded-lg hover:bg-grey-600 transition-colors flex items-center justify-center gap-2">Cancel</a>
                <button type="submit"
                    class="w-auto px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors flex items-center justify-center gap-2">
                    {{ isset($author) ? 'Update' : 'Create' }} Author
                </button>
            </div>
        </form>
    </div>
@endsection
