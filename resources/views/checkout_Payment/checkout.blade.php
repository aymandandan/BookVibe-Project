<x-checkout-layout>
    @if (session('error'))
        <!-- here session('error') equivalence to $_SESSION('error') -->
        <div>
            {{ session('error') }}
        </div>
    @endif
    <div class="content_flex font-sans">
        <div class="firstDiv">

            <form action="{{ route('checkout_validation') }}" method="POST">
                @csrf

                <div>
                    <h1 class="title topBottomSpace" style="font-weight: bold">Delivery Address</h1>
                </div>

                <div class="name_flex">
                    <div style="width: 100%">
                        <label for="name">Full Name:</label><br>
                        <input type="text" id="name" name="Name" required placeholder="Name"
                            class="margin_Fields corners" value="{{ Auth::user()->name }}">
                    </div>
                </div>

                <div>
                    <label for="email">Email:</label><br>
                    <input type="email" name="emailValue" id="email" required placeholder="yourName@gmail.com"
                        class="corners" value="{{ Auth::user()->email }}">
                </div>

                <div>
                    <label for="phoneNb">Phone Number:</label><br>
                    <input type="tel" name="phone" id="phoneNb" placeholder="+961 70123456" class="corners"
                        required value="{{ Auth::user()->phone }}">
                </div>

                <div>
                    <label for="country">Country:</label><br>
                    <input type="text" name="country" id="country" class="corners" required
                        value="{{ Auth::user()->country }}">
                </div>

                <div class="address_flex">

                    <div>
                        <label for="city">City:</label><br>
                        <input type="text" name="city" id="city" class="margin_Fields corners" required
                            value="{{ Auth::user()->city }}">
                    </div>

                    <div>
                        <label for="state">State:</label><br>
                        <input type="text" name="state" id="state" class="margin_Fields corners" required
                            value="{{ Auth::user()->state }}">
                    </div>

                    <div>
                        <label for="zip_code">ZIP Code:</label><br>
                        <input type="text" name="zipCode" id="zip_code" class="margin_Fields corners" required
                            value="{{ Auth::user()->zip_code }}">
                    </div>

                </div>
                <!-- Credit Card section initially Hidden -->
                <div id="paymentSection">
                    <div>

                        <h3 style="font-weight: bold" class="title">
                            Credit Card Payment:
                        </h3>

                    </div>

                    <div class="payment_flex">

                        <div>
                            <label for="cardNumber">Credit Card Number:</label><br>
                            <input type="text" id="cardNumber" name="creditCardNum" required
                                class="margin_Fields corners" value="{{ Auth::user()->credit_card_nb }}"><br><br>
                        </div>

                        <div>
                            <label for="cardExpiry">Card Expiry Date:</label><br>
                            <input type="text" id="cardExpiry" name="exp_date" placeholder="MM/YY"
                                class="margin_Fields corners">
                        </div>

                        <div>
                            <label for="cvv">CVV:</label><br>
                            <input type="text" id="cvv" name="cvv_value" class="margin_Fields corners">
                        </div>

                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit" class="btn_Pay" class="margin_Fields corners">
                </div>
            </form>
        </div>

        <div class="secondDiv">
            <div class="topBottomSpace">
                <h1 class="title boldStyle" style="font-weight: bold">Order Summary:</h1>
            </div>
            <hr>
            <div>
                <div class="flex_Cart">
                    <div style="display: flex">
                        <div>Items:&nbsp;&nbsp;</div>
                        <div>{{ $nbOfItems }}</div>
                    </div>
                    <div>
                        <a href="{{ route('cart.Page') }}" class="detailsLink">Details</a>
                    </div>
                </div>
                <div class="flex_Cart">
                    <h6>Order SubTotal :</h6>
                    <p>{{ $subTotal }}</p>
                </div>
                <div class="flex_Cart">
                    <h6>Delivery Charges : </h6>
                    <p>$10.00</p>
                </div>
            </div>
            <hr>
            <div class="topBottomSpace flex_Cart">
                <h6 class="boldStyle">Total Cost :</h6>
                <p> ${{ $subTotal + 10.0 }}</p>
            </div>
        </div>
    </div>
</x-checkout-layout>
