@extends('layouts.admin')

@section('title', isset($category) ? 'Edit Category' : 'Create Category')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold text-primary-500 mb-6">
            {{ isset($category) ? 'Edit Category' : 'Create New Category' }}
        </h2>

        <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
            method="POST">
            @csrf
            @isset($category)
                @method('PUT')
            @endisset

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
                    class="w-full rounded border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.categories.index') }}"
                    class="w-auto px-4 py-2 bg-grey-500 text-white rounded-lg hover:bg-grey-600 transition-colors flex items-center justify-center gap-2">Cancel</a>
                <button type="submit"
                    class="w-auto px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors flex items-center justify-center gap-2">
                    {{ isset($category) ? 'Update' : 'Create' }} Category
                </button>
            </div>
        </form>
    </div>
@endsection
