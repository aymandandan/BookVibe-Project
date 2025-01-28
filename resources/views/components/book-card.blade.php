<div class=" bg-white flex gap-2 flex-col rounded-lg py-4 px-3 w-auto shadow-lg">
    <a href="#" class="w-full h-auto flex items-center justify-center bg-gray-100 p-0.5 rounded-sm">
        <img alt="book cover" src="{{ $book->cover_img }}" class="card-img" />
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
        <form class="w-fit">
            <button
                class="w-auto px-2 py-1 bg-indigo-400 text-grey-100 shadow rounded-xl hover:bg-indigo-300 hover:text-white transition ease-in-out duration-150 fill-grey-100">
                <x-favorite-icon />
            </button>
        </form>
    </div>

</div>
