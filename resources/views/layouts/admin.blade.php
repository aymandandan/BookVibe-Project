<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BookVibe Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100" x-data="{ mobileMenuOpen: false }">
        <!-- Mobile Menu Button - Now Sticky -->
        <div class="md:hidden bg-primary-500 p-4 flex justify-between items-center sticky top-0 z-[1001]">
            <a href="{{ route('home') }}" class="text-white font-bold text-xl">BookVibe</a>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Sidebar -->
        <aside class="bg-white w-64 fixed h-full shadow-lg transform transition-all duration-300 ease-in-out"
            :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" style="z-index: 1000;">
            <div class="p-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-500 mb-6 hidden md:block">BookVibe
                    Admin</a>
                <nav class="space-y-2">
                    <x-admin-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-admin-nav-link>
                    <x-admin-nav-link href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.*')">
                        Books
                    </x-admin-nav-link>
                    <x-admin-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.*')">
                        Categories
                    </x-admin-nav-link>
                    <x-admin-nav-link href="{{ route('admin.authors.index') }}" :active="request()->routeIs('admin.authors.*')">
                        Authors
                    </x-admin-nav-link>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="md:ml-64 p-4 min-h-screen" @click="mobileMenuOpen = false">
            <!-- Responsive Header -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-800">@yield('title')</h1>
                    <div class="flex items-center space-x-4">
                        <!-- Add notifications/user menu here -->
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                @yield('content')
            </div>
        </main>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-50 bg-black/50 md:hidden" style="display: none;"
            @click="mobileMenuOpen = false">
        </div>
    </body>

</html>
