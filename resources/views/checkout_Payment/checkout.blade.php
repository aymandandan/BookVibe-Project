<x-checkout>
  <div class="content_flex font-sans">
    <div class="firstDiv">
      <form action="{{ route("checkout_validation")}}" method="POST">
        @csrf
        <div>
          <h1 class="title topBottomSpace" style="font-weight: bold">Delivery Address</h1>
        </div>
        <div class="name_flex">
        <div style="width: 100%">
          <label for="name">Full Name:</label><br>
          <input type="text" id="name" name="Name" required placeholder="Name" class="margin_Fields corners">
        </div>
        </div>
        <div>
          <label for="email">Email:</label><br>
          <input type="email" name="emailValue" id="email" required placeholder="yourName@gmail.com" class="corners">
        </div>
        <div>
          <label for="phoneNb">Phone Number:</label><br>
          <input type="tel" name="phone" id="phoneNb" placeholder="+961 70123456" class="corners" required>
        </div>
        <div>
          <label for="country">Country:</label><br>
          <input type="text" name="country" id="country" class="corners" required> 
        </div class="address_flex">
        <div class="name_flex">
          <div>
            <label for="city">City:</label><br>
            <input type="text" name="city" id="city" class="margin_Fields corners" required>
          </div>
          <div>
            <label for="state">State:</label><br>
            <input type="text" name="state" id="state" class="margin_Fields corners" required>
          </div>
          <div>
            <label for="zip_code">ZIP Code:</label><br>
            <input type="text" name="zipCode" id="zip_code" class="margin_Fields corners" req>
          </div>
        </div>
        <!-- Credit Card section initially Hidden -->
        <div id="paymentSection" style="display: none">
          <div>
            <h3 style="font-weight: bold" class="title">
              Credit Card Payment:
            </h3>
          </div>
          <div class="payment_flex">
            <div>
              <label for="cardNumber">Credit Card Number:</label><br>
              <input type="text" id="cardNumber" name="creditCardNum" required class="margin_Fields corners"><br><br>
            </div>
            <div>
              <label for="cardExpiry">Card Expiry Date:</label><br>
              <input type="text" id="cardExpiry" name="exp_date" required placeholder="MM/YY" class="margin_Fields corners">
            </div>
            <div>
              <label for="cvv">CVV:</label><br>
              <input type="text" id="cvv" name="cvv_value" required class="margin_Fields corners">
            </div>
          </div>
        </div>
        <div>
          <input type="submit" name="submit" value="Continue To Payment" class="btn_Pay" class="margin_Fields corners">
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
          <div> 
            <h1 style="display: inline;float:left">Number Of Items: </h1>
            <p> </p>
          </div>
          <div>
            <a href="{{ route('dashboard') }}" style="float: right">Details</a>
          </div>
        </div>
        <div>
          <h6>Order SubTotal: </h6>
          <p></p>
        </div>
        <div>
          <h6>Sale Discount: </h6>
          <p></p>
        </div>
        <div>
          <h6>Delivery Charges: </h6>
          <p></p>
        </div>
      </div>
      <hr>
      <div class="topBottomSpace">
        <h6 class="boldStyle">Total Cost:</h6>
        <p></p>
      </div>
    </div>
  </div>
</x-checkout>