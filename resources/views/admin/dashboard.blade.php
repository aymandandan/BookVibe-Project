@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="text-primary-500 text-3xl font-bold mb-2">{{ $stats['books'] }}</div>
                <div class="text-gray-600">Total Books</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="text-primary-500 text-3xl font-bold mb-2">{{ $stats['categories'] }}</div>
                <div class="text-gray-600">Categories</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="text-primary-500 text-3xl font-bold mb-2">{{ $stats['authors'] }}</div>
                <div class="text-gray-600">Authors</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- <a href="{{ route('admin.books.index') }}"
                class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="text-primary-500 font-medium">Manage Books</div>
                <div class="text-gray-500 text-sm mt-2">Add, edit or remove books</div>
            </a>
            <a href="{{ route('admin.categories.index') }}"
                class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="text-primary-500 font-medium">Manage Categories</div>
                <div class="text-gray-500 text-sm mt-2">Organize book categories</div>
            </a>
            <a href="{{ route('admin.authors.index') }}"
                class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="text-primary-500 font-medium">Manage Authors</div>
                <div class="text-gray-500 text-sm mt-2">Manage author profiles</div>
            </a> --}}
        </div>
    </div>
@endsection
