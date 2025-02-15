<x-app-layout>
    <div class="flex flex-col w-full items-center justify-center">
        <div class="w-full flex flex-col sm:flex-row sm:items-start items-center">
            {{-- Image Section --}}
            <div class="sm:w-4/12 w-full flex flex-col items-center px-4 py-2 mt-8 sm:sticky sm:top-16">
                <div class="w-full flex justify-center items-center relative max-w-64 rounded-md">
                    <img src="{{ asset($book->cover_img) }}" alt="{{ __('Cover image of ') . $book->title }}"
                        class="rounded-md w-full h-auto">
                </div>

            </div>

            {{-- Main Content Section --}}
            <div class="sm:mt-10 mt-6 flex flex-col gap-4 px-6 sm:w-8/12">
                {{-- Title --}}
                <h1 class="text-3xl font-serif text-indigo-800">
                    {{ $book->title }}
                </h1>

                {{-- Author --}}
                @if ($author)
                    <p class="text-lg font-serif text-indigo-500">
                        {{ $author->name . __(' (Author)') }}
                    </p>
                @endif

                {{-- Price --}}
                <p class="text-xl font-serif text-primary-500 py-2">
                    {{ $book->price . '$' }}
                </p>

                {{-- Stock Status --}}
                @if ($book->type == 'hard_book')
                    <p @class([
                        'font-serif font-bold text-lg rounded-lg w-fit p-2',
                        'text-red-500 border border-red-500' => $book->stock_qty <= 0,
                        'text-green-500 border border-green-500' => $book->stock_qty > 0,
                    ])>
                        {{ $book->stock_qty <= 0 ? __('Out Of Stock') : __('In Stock') }}
                    </p>
                @endif

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row mt-4 justify-evenly w-full sm:w-3/4 gap-2 2xl:w-1/2">
                    <form action="{{ route('add.Cart', $book->id) }}" method="POST">
                        @csrf
                        <button @disabled($book->type == 'hard_book' && $book->stock_qty <= 0)
                            class="text-base w-full sm:w-auto text-center uppercase py-1 sm:py-3 px-4 sm:px-8 bg-primary-500 text-white hover:bg-primary-400 transition duration-150 ease-in-out rounded-2xl disabled:opacity-50 disabled:cursor-not-allowed">
                            {{ __('Add to Cart') }}
                        </button>
                    </form>
                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button
                            class="font-bold text-base w-full sm:w-auto text-center uppercase py-1 sm:py-3 px-4 sm:px-8 bg-indigo-100 text-primary-500 border border-primary-500 hover:border-primary-400 hover:text-primary-400 transition duration-150 ease-in-out rounded-2xl">
                            {{ __('Add to Wishlist') }}
                        </button>
                    </form>
                </div>

                {{-- Category --}}
                @if ($category)
                    <p class="text-lg font-serif text-indigo-500 mt-2">
                        {{ __('Category: ') . $category->name }}
                    </p>
                @endif

                {{-- Content Sections --}}
                <x-details-drawer :title="__('Description')">
                    <div class="w-11/12 py-2">
                        <p class="text-base whitespace-pre-wrap">{{ $book->description }}</p>
                    </div>
                </x-details-drawer>

                {{-- Product Details --}}
                <x-details-drawer title="{{ __('Product Details') }}">
                    <div class="py-2">
                        <table class="table-auto">
                            <tbody>
                                <tr>
                                    <td class="text-grey-700">
                                        {{ __('Publisher') }}
                                    </td>
                                    <td class="py-0.5 pl-5">
                                        {{ $book->publisher }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-grey-700">
                                        {{ __('Publish Date') }}
                                    </td>
                                    <td class="py-0.5 pl-5">
                                        {{ $book->publish_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-grey-700">
                                        {{ __('Number of Pages') }}
                                    </td>
                                    <td class="py-0.5 pl-5">
                                        {{ $book->page_nb }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-grey-700">
                                        {{ __('Language') }}
                                    </td>
                                    <td class="py-0.5 pl-5">
                                        {{ $book->language }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-grey-700">
                                        {{ __('Book Type') }}
                                    </td>
                                    <td class="py-0.5 pl-5">
                                        {{ $book->type == 'hard_book' ? __('Hard Copy') : __('eBook') }}
                                    </td>
                                </tr>
                                @if ($book->type == 'hard_book')
                                    <tr>
                                        <td class="text-grey-700">
                                            {{ __('Dimensions') }}
                                        </td>
                                        <td class="py-0.5 pl-5">
                                            {{ $book->dimensions }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-grey-700">
                                            {{ __('Amount Left') }}
                                        </td>
                                        <td class="py-0.5 pl-5">
                                            {{ $book->stock_qty }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($book->type == 'e_book')
                                    <tr>
                                        <td class="text-grey-700">
                                            {{ __('Size (MB)') }}
                                        </td>
                                        <td class="py-0.5 pl-5">
                                            {{ $book->size }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-grey-700">
                                            {{ __('Format') }}
                                        </td>
                                        <td class="py-0.5 pl-5">
                                            {{ $book->format }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </x-details-drawer>

                @if ($author?->about)
                    <x-details-drawer :title="__('About Author')">
                        <div class="w-11/12 py-2">
                            <p class="text-base whitespace-pre-wrap">{{ $author->about }}</p>
                        </div>
                    </x-details-drawer>
                @endif
            </div>
        </div>

        {{-- Similar Books Section --}}
        @if ($similarBooks->isNotEmpty())
            <div class="w-full p-8">
                <h2 class="w-full text-2xl text-gray-900 font-serif mb-4">
                    {{ __('You Might Also Like') }}
                </h2>
                <div class="flex w-full relative items-center">
                    <div class="flex w-full items-center gap-4 overflow-x-auto px-4 py-3 sm:px-0">
                        @foreach ($similarBooks as $similar)
                            @include('components.recommended-book-card', ['book' => $similar])
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
