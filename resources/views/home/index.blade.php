<x-app-layout>
    <div class="home">
        <div class="relative w-full h-[450px] bg-center bg-cover"
            style="background-image: url('/assets/util_images/main.jpg');">
            <!-- Transparent Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative flex items-center justify-center h-full text-center px-4">
                <h1 class="text-white text-2xl md:text-4xl font-bold">
                    "Books are the gateways to knowledge, imagination, and endless possibilities."

                </h1>
            </div>
        </div>
        <div class="trendbook flex justify-between items-center p-4 bg-gray-100"
            style="background-color: rgb(56, 55, 54)">
            <bold class="text-500">Trending Books</bold>
            <a href="/search">
                <h6 class="font_trend_book text-blue-500 hover:underline">see more trending books </h6>
            </a>

        </div>

        <div class=" mt-2 grid sm:grid-cols-3 gap-2 grid-cols-1 lg:grid-cols-5">
            @if (isset($books) && $books->count() > 0)
                @foreach ($books as $book)
                    @include('components.home-book-cart', ['book' => $book])
                @endforeach
            @else
                <p>No books found.</p>
            @endif
        </div>

        <div class="flex justify-center items-center">
            <div class="m-3 container bg-white h-[200px] flex flex-col justify-between">
                <div>
                    <p class=" pt-4 font-bold text-2xl text-primary-500 text-center">
                        Why you would use BookVibe Website?
                    </p>
                </div>
                <div class=" pb-7 text-2xl text-blue-900 text-center">
                    <p>
                        "Discover your next favorite read with BookVibe – where personalized recommendations, unbeatable
                        prices,<br> and a vast collection of books come together to create the ultimate reading
                        experience
                        for every book lover."
                    </p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
