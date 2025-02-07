<div class="flex flex-col gap-4 px-3">
    @forelse ($wishlistitems as $item)
        <div id="wishlist-item-{{ $item->id }}"
            class="bg-white flex items-center justify-between gap-6 rounded-lg py-4 px-3 w-auto h-[150px] shadow-lg">
            <!-- Left Section: Image and Text -->
            <div class="flex items-center gap-6 flex-grow">
                <!-- Image Container -->
                <a href="{{ route('book.show', $item->id) }}"
                    class="flex h-32 w-auto flex-shrink-0 rounded-md bg-gray-100 p-0.5">
                    <img alt="book cover" src="{{ asset($item->cover_img) }}"
                        class="w-full h-full object-cover rounded-sm" />
                </a>

                <!-- Text Container -->
                <div class="flex flex-col justify-center max-w-7/12">
                    <!-- Book Name -->
                    <a href="{{ route('book.show', $item->id) }}"
                        class="text-2xl font-semibold text-gray-800">{{ $item->title }}</a>
                    <!-- Book Author -->
                    <a href="{{ route('authorPage', $item->author_id) }}"
                        class="text-base text-gray-600">{{ $item->author_name }}</a>
                    <p class="text-sm text-gray-600">
                        {{ $item->type == 'hard_book' ? __('Hard Copy') : __('eBook') }}</p>
                </div>
            </div>

            {{-- <!-- Middle Section: Additional Text -->
            <div class="flex flex-col justify-center flex-grow">
                <h3 class="text-lg font-semibold text-gray-800">
                    e repellat molestiae exercitationem cum, laudantium nam.
                </h3>
            </div> --}}

            <!-- Right Section: Button and Image 2 -->
            <div class="flex items-center gap-4 flex-shrink-0">
                <!-- Button Container -->
                <div class="flex flex-col items-center gap-2 justify-center">
                    <form class="w-full" action="{{ route('add.Cart', $item->id) }}" method="POST">
                        @csrf
                        <button
                            class="w-full bg-primary-500 rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150">
                            {{ __('ADD TO CART') }}
                        </button>
                    </form>
                    <!-- Image 1 -->
                    <img src="/assets/util_images/heart_image.png"
                        class="w-[20px] h-[20px] scale-105 hover:scale-110 transition-transform" />
                </div>

                <!-- Image 2 Container -->
                <div class="flex items-center justify-center">
                    <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to remove this item from your wishlist?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img src="/assets/util_images/delete_icon.png"
                                class="w-[40px] h-[40px] scale-105 hover:scale-110 transition-transform" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600">Your wishlist is empty.</p>
    @endforelse
</div>
