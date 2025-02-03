<div class=" bg-white flex gap-2 flex-col rounded-lg py-4 px-3 w-auto shadow-lg">
    <a href="#" class="w-full h-auto flex items-center justify-center bg-gray-100 p-0.5 rounded-sm  hover:scale-110 hover:shadow-[0_0_20px_#ee3c5f] transition-transform duration-300">
        <img alt="book cover "  src="{{ $book->cover_img }}" class="card-img" />
    </a>

    <a href="#" class="text-center">
        {{ $book->title }}
    </a>

    <div class="text-sm">

            {{ $book->author_name }}

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

    </div>


</div>