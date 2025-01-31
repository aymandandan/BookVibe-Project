<x-app-layout>
    @if (Session::get('search_type') == 'category')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Session::get('search_category') . ' Category' }}
            </h2>
        </x-slot>
    @elseif (Session::get('search_type') == 'book_type')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Session::get('search_book_type') }}
            </h2>
        </x-slot>
    @endif
    <div class="w-full flex justify-center">
        <div class="max-w-7xl">
            <div class="mx-8 my-6 text-2xl text-grey-900">
                {{ $books->total() . __(' search results found') }}
            </div>
            <div class="w-full py-4 px-8">
                <div class="grid sm:grid-cols-3 gap-1 grid-cols-1 lg:grid-cols-5">
                    @foreach ($books as $book)
                        @include('components.book-card', ['book' => $book])
                    @endforeach

                </div>
                <div class="p-4">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
