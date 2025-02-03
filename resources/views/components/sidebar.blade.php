<div class="bg-white left-0 w-64 h-screen z-10 overflow-auto shadow shadow-grey-200">
    <p class="flex text-center w-full p-3 text-bold text-2xl">
        {{ __('Book Types') }}
    </p>

    <x-sidebar-link action="{{ route('books.searchType') }}" value="hard_book">
        {{ __('Hard Books') }}
    </x-sidebar-link>
    <x-sidebar-link action="{{ route('books.searchType') }}" value="e_book">
        {{ __('eBooks') }}
    </x-sidebar-link>

    <p class="flex text-center w-full p-3 text-bold text-2xl">
        {{ __('Categories') }}
    </p>

    @foreach ($categories as $category)
        <x-sidebar-link action="{{ route('books.searchCategory') }}" value="{{ urlencode($category->name) }}">
            {{ $category->name }}
        </x-sidebar-link>
    @endforeach

</div>
