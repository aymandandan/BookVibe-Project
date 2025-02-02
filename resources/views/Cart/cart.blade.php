<x-app-layout>
  <div class="flexParentContainer">
      <div class="cartsContainer">
          <div class="centeredTitle">
            <h1>Shopping Cart</h1>
          </div>
          @if (!empty($cartsBookRecords))
            <div class="centeredTitle">
              <h1>Your Cart [{{count($cartsBookRecords)}} items]</h1>
            </div>
          @endif
          <hr class="hrElement">
        <div class="titlesContainer" style="margin-top: 10px;margin-bottom: 10px">
            <h3 class="boldedHeaders">
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
        @if(!empty($cartsBookRecords))
        @foreach($cartsBookRecords as $cartBookRecord)
        <div class="contentFlex" style="margin-top: 20px;margin-bottom:20px">
          <div class="imgAndDesc">
            <div class="imgContainer">
              <img src="{{asset($cartsBookRecord->coverImage)}}" width="125" height="200">
            </div>
            <div class="descContainer">
              <h1>{{ $cartsBookRecord->book_title }}</h1>
              <h3>{{ $cartsBookRecord->description }}</h3>
              <a href="{{ route('cart.destroy',$cartsBookRecords->cartId)}}"><img src="{{asset('assets/util_images/trash_bin.png')}}" width="20" height="20"></a>
            </div>
          </div>
          <div class="quantityContainer">
            <form action="{{ route('add.Cart',$cartBookRecord->book_id)}}" method="POST">
              @csrf
              <input type="number" name="quantity" value="{{ $cartsBookRecord->quantity }}" min="1" class="quantityInput"><br>
              <!--<input type="hidden" name="idOfBook" value="">-->
              <input type="submit" name="updateQnty" value="update_Quantity">
            </form>
          </div>
          <div class="pricePerItem">
            ${{ $cartsBookRecord->priceBook }}
          </div>
          <div class="SubtotalPrice">
            ${{ $cartsBookRecord->totalPrice }}
          </div>
        </div>
        <hr>
        @endforeach
      </div>
      @endif
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
          <div>{{ $totalCost }}</div>
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
            ${{$totalCost + 10.00}}.00
          </div>
        </div>
        <hr class="hrElement">
        <div style="margin-top: 30px" class="boldedHeaders checkoutLink whiteText">
          <a href="">Go To Checkout</a>
        </div>
      </div>
  </div>
</x-app-layout>