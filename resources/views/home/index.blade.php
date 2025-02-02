
<x-app-layout>
    <div class="base">
    <div class="relative w-full h-[450px] bg-center bg-cover" style="background-image: url('/images/main.jpeg');">
        <!-- Transparent Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    
        <div class="relative flex items-center justify-center h-full text-center px-4">
            <h1 class="text-white text-2xl md:text-4xl font-bold">
                "Books are the gateways to knowledge, imagination, and endless possibilities."
                
            </h1>
        </div>
    </div>
<div class="pbook flex justify-between items-center p-4 bg-gray-100"  style="background-color: rgb(56, 55, 54)">
    <bold class="text-500">Trending Books</bold>
    <a href="#"><h6 class="font text-blue-500 hover:underline">see more trending books </h6></a>
    
</div>
<!--<div class="container" >
    <div class=" item item1" style="background-color: rgb(212, 208, 208)">
    <div >
        <img src="/images/h1.png" class="imges1" >
    </div>
    <div class="t">
    <h1><bold> Don't Make Me Think</bold></h1>
    
    <p class="c" style="color: rgb(168, 20, 20)"> 20$</p>
    </div>
    </div>
    <div class=" item item2" style="background-color: rgb(212, 208, 208)">
        <div >
            <img src="/images/h4.jpeg"  class="imges1">
        </div>
    </div>
    <div class=" item item3" style="background-color: rgb(212, 208, 208)"><div >
        <img src="/images/h3.jpeg" class="imges1">
        </div>
    </div>
    <div class=" item item4" style="background-color: rgb(212, 208, 208)">
       <div >
            <img src="/images/h5.jpeg" class="imges1">
            </div>
    </div>
    <div class=" item item5" style="background-color: rgb(212, 208, 208)"> <div >
        <img src="/images/h6.jpeg" class="imges1">
        </div></div>

</div>-->
   <div class=" mt-2 grid sm:grid-cols-3 gap-2 grid-cols-1 lg:grid-cols-5">
    @if (isset($books) && $books->count() > 0)
    @foreach ($books as $book)
        @include('components.home-book-cart', ['book' => $book])
    @endforeach
@else
    <p>No books found.</p>
@endif
    </div> 
  <!--
<div class="container " >
    <div class=" item item1" style="background-color: rgb(212, 208, 208)">
    <div >
        <img src="/images/h1.png" class="imges1" >
    </div>
    <div class="t">
    <h1><bold> Don't Make Me Think</bold></h1>
    
    <p class="c" style="color: rgb(168, 20, 20)"> 20$</p>
    </div>
    </div>
    <div class=" item item2" style="background-color: rgb(212, 208, 208)">
        <div >
            <img src="/images/h4.jpeg"  class="imges1">
        </div>
    </div>
    <div class=" item item3" style="background-color: rgb(212, 208, 208)"><div >
        <img src="/images/h3.jpeg" class="imges1">
        </div>
    </div>
    <div class=" item item4" style="background-color: rgb(212, 208, 208)">
       <div >
            <img src="/images/h5.jpeg" class="imges1">
            </div>
    </div>
    <div class=" item item5" style="background-color: rgb(212, 208, 208)"> <div >
        <img src="/images/h6.jpeg" class="imges1">
        </div></div>

</div>

</div>-->

<div class="m-3 container bg-white h-[200px] flex flex-col justify-between">
    <div >
      <p class=" pt-4 font-bold text-2xl text-primary-500 text-center">
        Why you would use BookVibe Website?
      </p>
    </div>
    <div class=" pb-7 text-2xl text-blue-900 text-center">
      <p>
        "Discover your next favorite read with BookVibe – where personalized recommendations, unbeatable prices,<br> and a vast collection of books come together to create the ultimate reading experience for every book lover."
      </p>
    </div>
  </div>
  <footer class="bg-[#161a24] text-white py-8 flex-shrink-0">
    <div class="container mx-auto px-4">
      <!-- Footer Content Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Quick Links -->
        <div>
          <h3 class="font-bold text-lg mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-blue-300">Home</a></li>
            <li><a href="#" class="hover:text-blue-300">Browse Books</a></li>
            <li><a href="#" class="hover:text-blue-300">Categories</a></li>
            <li><a href="#" class="hover:text-blue-300">Best Sellers</a></li>
            <li><a href="#" class="hover:text-blue-300">New Arrivals</a></li>
            <li><a href="#" class="hover:text-blue-300">About Us</a></li>
            <li><a href="#" class="hover:text-blue-300">Contact Us</a></li>
          </ul>
        </div>

        <!-- Newsletter Signup -->
        <div>
          <h3 class="font-bold text-lg mb-4">Subscribe to Our Newsletter</h3>
          <form action="home" class="flex flex-col space-y-2">
            <input type="email" placeholder="Your email" class="p-2 rounded text-gray-900">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
              Subscribe
            </button>
          </form>
        </div>

        <!-- Contact Information -->
        <div>
          <h3 class="font-bold text-lg mb-4">Contact Us</h3>
          <p>Email: info@bookvibe.com</p>
          <p>Phone: +123 456 7890</p>
          <p>Address: 123 Book Street, Reading City, USA</p>
        </div>
      </div>

      <!-- Social Media Links -->
      <div class="flex justify-center space-x-6 mt-8">
        <a href="#" class="text-white hover:text-blue-300">
          <i class="fab fa-facebook"></i> <!-- Replace with actual icons -->
        </a>
        <a href="#" class="text-white hover:text-blue-300">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-white hover:text-blue-300">
          <i class="fab fa-instagram"></i>
        </a>
      </div>

      <!-- Copyright Notice -->
      <div class="text-center mt-8 border-t border-blue-800 pt-4">
        <p>© 2025 BookVibe. All rights reserved.</p>
      </div>
    </div>
  </footer>


  <!--
<footer>
    <div class="base " style="  color: rgb(201, 201, 30) ">
    <div class="container h-[200px] ">
    <div class="aboutus w-[1000px] " style="background-color:#161a24">
     <p class="mt-5 ml-5 font-bold" > BookVibes</p>
    <a href="#"> <p class="mt-3 ml-5 " > About us</p></a>
    <a href="#"> <p class="mt-3 ml-5 " > Our Purpose</p></a>
    <a href="#"> <p class="mt-3 ml-5 " > Reviews</p></a>
    <a href="#"> <p class=" ml-80 " > Contact us <br>Available via Phone, Email or live chat!</p></a>
    
    

    </div>
    <div class="relative z-15 ">
        <img src="/images/r.png" class="h-full w-auto object-cover">
    </div>
    </div>
</div>
</footer>
-->
</x-app-layout>

