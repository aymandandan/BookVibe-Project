<div class="flex h-44 w-auto flex-shrink-0 rounded-md sm:h-72">
    <a class="relative" href="{{ route('book.show', $book->id) }}">
        <img alt="{{ $book->title }}" src="{{ asset($book->cover_img) }}"
            class="shadow-md shadow-grey-900 h-44 w-auto rounded-md sm:h-72" />
    </a>
</div>
