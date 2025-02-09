<x-app-layout>
    @if (session('error'))
        <div id="error-message" class="error-block">
            <p>{{ session('error') }}</p>
            <button id="close-btn" class="close-btn">&times;</button>
        </div>
    @endif

    <div class="flex flex-row justify-around w-full">
        <div class="flex flex-col m-12 w-full">

            <div class="centeredTitle">
                <h1>Shopping Cart</h1>
            </div>

            @if (!empty($cartsBookRecords))
                <div class="centeredTitle">
                    <h1>Your Cart [{{ count($cartsBookRecords) }} items]</h1>
                </div>
            @endif

            <hr class="hrElement">

            <div class="titlesContainer" style="margin-top: 10px;margin-bottom: 10px">
                <h3 class="boldedHeaders w-1/2">
                    Product Details
                </h3>
                <div class="inlineClassContainer">
                    <h3 class="boldedHeaders">
                        Quantity
                    </h3>
                    <h3 class="boldedHeaders">
                        Price
                    </h3>
                    <h3 class="boldedHeaders">
                        Subtotal
                    </h3>
                </div>
            </div>

            <hr class="hrElement">

            @if (!empty($cartsBookRecords))
                @foreach ($cartsBookRecords as $cartBookRecord)
                    <div class="contentFlex" style="margin-top: 20px;margin-bottom:20px">
                        <div class="imgAndDesc w-1/2">
                            <a href="{{ route('book.show', $cartBookRecord->cartId) }}" class="imgContainer">
                                <img src="{{ asset($cartBookRecord->coverImage) }}" width="125" height="200">
                            </a>
                            <div class="descContainer">
                                <a href="{{ route('book.show', $cartBookRecord->cartId) }}"
                                    class="boldedHeaders">{{ $cartBookRecord->book_title }}</a>
                                <h3>Type: {{ $cartBookRecord->type == 'hard_book' ? 'Hard Copy' : 'eBook' }}</h3>
                                <div class="deleteBlock">
                                    <form action="{{ route('cart.destroy', $cartBookRecord->cartId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button><img src="{{ asset('assets/util_images/trash_bin.png') }}"
                                                width="20" height="20"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="quantityContainer">
                            <form action="{{ route('update.Cart', $cartBookRecord->book_id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $cartBookRecord->quantity }}"
                                    min="1" class="quantityInput"><br>
                                <input type="submit" name="updateQnty" value="update"
                                    class="updateButton bg-indigo-600">
                            </form>
                        </div>
                        <div class="pricePerItem">
                            ${{ $cartBookRecord->priceBook }}
                        </div>
                        <div class="SubtotalPrice">
                            ${{ $cartBookRecord->totalPrice }}
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>
        <div class="summaryCart">
            <div>
                <h1 class="boldedHeaders greyText" style="text-align: center;margin-bottom:20px">Order Summary:</h1>
            </div>
            <hr class="hrElement">
            <div class="orderSummaryFlex" style="margin-top: 20px">
                <div style="display: flex">
                    <div>Items:&nbsp;&nbsp;</div>
                    <div>{{ count($cartsBookRecords) }}</div>
                </div>
                <div>${{ $totalCost }}</div>
            </div>
            <div class="orderSummaryFlex" style="margin-top: 10px">
                <h1>
                    Shipping:
                </h1>
                <div>
                    $10.00
                </div>
            </div>
            <div class="orderSummaryFlex" style="margin-top: 10px">
                <h1>
                    Total Cost:
                </h1>
                <div>
                    ${{ $totalCost + 10.0 }}
                </div>
            </div>
            <hr class="hrElement">
            <div style="margin-top: 30px" class="boldedHeaders checkoutLink whiteText">
                <a
                    href="{{ route('checkoutPage', ['totalCost' => $totalCost, 'nbOfItems' => count($cartsBookRecords)]) }}">Go
                    To Checkout</a>
            </div>
        </div>
    </div>
</x-app-layout>
