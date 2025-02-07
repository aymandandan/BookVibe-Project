<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Welcome back, Admin') }}
                </div>
            </div>
            <div class="w-full px-6 py-2 flex justify-around flex-col sm:flex-row">
                <a href="{{ route('book.create') }}"
                    class="px-2 py-1 m-2 rounded shadow bg-cyan-600 text-lg text-grey-100 hover:bg-cyan-500 cursor-pointer transition duration-150 ease-in-out">
                    {{ __('Add Book') }}
                </a>

                <a href="{{ route('books.search') }}"
                    class="px-2 py-1 m-2 rounded shadow bg-cyan-600 text-lg text-grey-100 hover:bg-cyan-500 cursor-pointer transition duration-150 ease-in-out">
                    {{ __('Veiw All Books') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
