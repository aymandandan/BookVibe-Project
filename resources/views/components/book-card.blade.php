@if(session('wishlist_success'))
    <div class="fixed bottom-4 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg">
        <p>{{ session('wishlist_success') }}</p>
    </div>
@endif

@if(session('wishlist_error'))
    <div class="fixed bottom-4 right-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg">
        <p>{{ session('wishlist_error') }}</p>
    </div>
@endif

<div class=" bg-white flex gap-2 flex-col rounded-lg py-4 px-3 w-auto shadow-lg">
    <a href="#" class="w-full h-auto flex items-center justify-center bg-gray-100 p-0.5 rounded-sm">
        <img alt="book cover" src="{{ asset($book->cover_img) }}" class="card-img" />
    </a>

    <a href="#" class="text-center">
        {{ $book->title }}
    </a>

    <div class="text-sm">
        @if ($book->author_name)
            {{ $book->author_name }}
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
        <form class="w-full">
            <button
                class="w-full bg-primary-500 rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150">
                {{ __('ADD TO CART') }}
            </button>
        </form>
        <!-- Add to Wishlist Button -->
        <form method="POST" action="{{ route('wishlist.store') }}" class="w-fit">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            //this for the id 
            
            <button type="submit"
                class="w-auto px-2 py-1 bg-indigo-400 text-grey-100 shadow rounded-xl hover:bg-indigo-300 hover:text-white transition ease-in-out duration-150 fill-grey-100">
                <x-favorite-icon />
            </button>
        </form>
    </div>

</div>

