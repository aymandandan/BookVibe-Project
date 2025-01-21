<x-app-layout>
  <div class="content_flex font-sans">
    <div class="firstDiv">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div>
          <h1 class="title topBottomSpace">Delivery Address</h1>
        </div>
        <div class="name_flex">
        <div>
          <label for="fname">First Name</label><br>
          <input type="text" id="fname" name="firstName" required placeholder="first Name" class="margin_Fields corners">
        </div>
        <div>
          <label for="lname">Last Name</label><br>
          <input type="text" id="lname" name="lastName" required placeholder="Last Name" class="margin_Fields corners">
        </div>
        </div>
        <div>
          <label for="EMAIL">Email:</label><br>
          <input type="email" name="emailValue" id="EMAIL" required placeholder="yourName@gmail.com" class="corners">
        </div>
        <div>
          <label for="phoneNb">Phone Number</label><br>
          <input type="tel" name="phone" id="phoneNb" placeholder="+961 70123456" class="corners">
        </div>
        <div>
          <label for="country">Country</label><br>
          <input type="text" name="country" id="country" class="corners"> 
        </div class="address_flex">
        <div class="name_flex">
          <div>
            <label for="CITY">City</label><br>
            <input type="text" name="city" id="CITY" class="margin_Fields corners">
          </div>
          <div>
            <label for="STATE">State</label><br>
            <input type="text" name="state" id="STATE" class="margin_Fields corners">
          </div>
          <div>
            <label for="ZIP_CODE">ZIP Code</label><br>
            <input type="text" name="zipCode" id="ZIP_CODE" class="margin_Fields corners">
          </div>
        </div>
        <div>
          <input type="submit" name="submit" value="Continue To Payment" class="btn_Pay">
        </div>
      </form>
    </div>
    
    <div class="secondDiv">
      <div class="topBottomSpace">
        <h1 class="title boldStyle">Order Summary</h1>
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
</x-app-layout>