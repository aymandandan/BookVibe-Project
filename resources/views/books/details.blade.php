<x-app-layout>
    <div class="flex flex-col w-full items-center justify-center">
        <div class="w-full flex flex-col sm:flex-row sm:items-start items-center">
            {{-- Image Div --}}
            <div class="sm:w-4/12 w-full flex flex-col items-center px-4 py-2 mt-8 sm:sticky sm:top-16">
                <div class="w-full flex justify-center items-center relative max-w-64 rounded-md">
                    <img src="{{ asset($book->cover_img) }}" alt="{{ $book->title }}" />
                </div>
                {{-- Admin Buttons --}}
                @if (Auth::user()->type == 'admin')
                    <div class="flex justify-evenly px-4 py-2 w-full">
                        <form>
                            <button
                                class="bg-cyan-600 text-grey-100 p-2 hover:bg-cyan-500 rounded shadow transition duration-150 ease-in-out">
                                {{ __('Edit') }}
                            </button>
                        </form>
                        <form>
                            <button
                                class="bg-red-600 text-grey-100 p-2 hover:bg-red-500 rounded shadow transition duration-150 ease-in-out">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            {{-- Other Info Div --}}
            <div class="sm:mt-10 mt-6 flex flex-col gap-4 px-6 sm:w-8/12">

                {{-- Title --}}
                <p class="text-3xl font-serif text-indigo-800">
                    {{ $book->title }}
                </p>
                {{-- Author Name --}}
                <p class="text-lg font-serif text-indigo-500">
                    {{ $author->name . __(' (Author)') }}
                </p>

                {{-- Price --}}
                <p class="text-xl font-serif text-primary-500 py-2">
                    {{ $book->price . __('$') }}
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row mt-4 justify-evenly w-full sm:w-3/4 gap-2 2xl:w-1/2">
                    <form>
                        <button @disabled($book->stock_qty <= 0)
                            class="text-base w-full sm:w-auto text-center uppercase py-1 sm:py-3 px-4 sm:px-8 bg-primary-500 text-grey-100 hover:bg-primary-400 transition duration-150 ease-in-out rounded-2xl">
                            {{ __('Add to Cart') }}
                        </button>
                    </form>
                    <form>
                        <button
                            class="font-bold text-base w-full sm:w-auto text-center uppercase py-1 sm:py-3 px-4 sm:px-8 bg-indigo-100 text-primary-500 border border-primary-500 hover:border-primary-400 hover:text-primary-400 transition duration-150 ease-in-out rounded-2xl">
                            {{ __('Add to Wishlist') }}
                        </button>
                    </form>
                </div>

                {{-- Category --}}
                <p class="text-lg font-serif text-indigo-500 mt-2">
                    {{ __('Category: ') . $category->name }}
                </p>

                {{-- Description --}}
                <x-details-drawer title="{{ __('Description') }}">
                    <div class="w-11/12 py-2">
                        <p class="text-base">
                            {{ $book->description }}
                        </p>
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

                {{-- About Author --}}
                <x-details-drawer title="{{ __('About Author') }}">
                    <div class="w-11/12 py-2">
                        <p class="text-base">
                            {{ $author->about }}
                        </p>
                    </div>
                </x-details-drawer>

                {{-- Reviews TODO --}}


            </div>

        </div>
        <div class="w-full p-8">
            <p class="w-full text-2xl text-grey-900 font-serif">
                {{ __('Other Similar Books') }}
            </p>
            <div class="flex w-full relative items-center">
                <div class="flex w-full items-center gap-x-2 overflow-x-scroll whitespace-nowrap px-4 py-3 sm:px-0">
                    @foreach ($other_books as $other)
                        {{-- <div class="flex h-44 rounded w-auto flex-shrink-0 sm:h-72"> --}}
                        @include('components.recommended-book-card', ['book' => $other])
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
