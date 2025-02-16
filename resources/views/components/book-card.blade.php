<div class=" bg-white flex gap-2 flex-col rounded-lg py-4 px-3 w-auto shadow-lg">
    <a href="{{ route('book.show', $book->id) }}"
        class="w-full h-auto flex items-center justify-center bg-gray-100 p-0.5 rounded-sm hover:scale-105 hover:shadow-primary-500 hover:shadow-[0_0_10px] transition-transform duration-300">
        <img alt="book cover" src="{{ asset($book->cover_img) }}" class="card-img" />
    </a>

    <a href="{{ route('book.show', $book->id) }}" class="text-center">
        {{ $book->title }}
    </a>

    <div class="text-sm">
        @if ($book->author_name)
            <a href="{{ route('authorPage', $book->author_id) }}">{{ $book->author_name }}</a>
        @endif
    </div>

    <div class="flex text-grey-500 text-sm">
        @if ($book->type == 'e_book')
            {{ __('eBook') }}
        @elseif ($book->type == 'hard_book')
            {{ __('Hard Cover') }}
        @endif
    </div>

    <div class="flex text-sm">
        {{ __('Price:') }}
        <div class="ml-1">
            {{ $book->price . '$' }}
        </div>
    </div>

    <div class="w-auto flex flex-row gap-2 justify-between mt-auto">
        <form class="w-full" action="{{ route('add.Cart', $book->id) }}" method="POST">
            <!-- Add to Cart Button-->
            <form class="w-full" action="{{ route('add.Cart', $book->id) }}" method="POST">
                @csrf
                <button @disabled($book->type == 'hard_book' && $book->stock_qty <= 0)
                    class="w-full bg-primary-500 uppercase rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150 disabled:opacity-50 disabled:cursor-not-allowed">
                    {{ $book->type == 'hard_book' && $book->stock_qty <= 0 ? __('Out Of Stock') : __('Add to Cart') }}
                </button>
            </form>

            <!-- Add to Wishlist Button -->
            <form method="POST" action="{{ route('wishlist.store') }}" class="w-fit">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit"
                    class="w-auto px-2 py-1 bg-indigo-400 text-grey-100 shadow rounded-xl hover:bg-indigo-300 hover:text-white transition ease-in-out duration-150 fill-grey-100">
                    <x-favorite-icon />
                </button>
            </form>
    </div>

</div>
