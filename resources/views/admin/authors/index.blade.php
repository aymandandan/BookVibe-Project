@extends('layouts.admin')

@section('title', 'Manage Authors')

@section('content')
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manage Authors</h1>
            <a href="{{ route('admin.authors.create') }}"
                class="w-auto px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Author</span>
            </a>
        </div>

        <!-- Search Section -->
        <div class="mb-6 bg-white rounded-lg shadow-sm p-4">
            <form action="{{ route('admin.authors.index') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                <div class="flex-1 relative">
                    <input type="text" name="search" placeholder="Search authors by name..."
                        value="{{ request('search') }}"
                        class="w-full pl-4 pr-10 py-2 rounded-lg border border-gray-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-500">
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="w-full md:w-auto px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors flex items-center justify-center gap-2">
                        <span class="hidden md:inline">Search</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    @if (request()->has('search'))
                        <a href="{{ route('admin.authors.index') }}"
                            class="w-full md:w-auto px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors flex items-center justify-center">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Authors Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($authors as $author)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $author->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                    <a href="{{ route('admin.authors.edit', $author) }}"
                                        class="text-primary-500 hover:text-primary-600">Edit</a>
                                    <form action="{{ route('admin.authors.destroy', $author) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600"
                                            onclick="return confirm('Are you sure you want to delete this author?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">No authors found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $authors->links() }}
        </div>
    </div>
@endsection
