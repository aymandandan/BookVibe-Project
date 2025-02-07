<x-app-layout>
    <div class="confirmFlexCon m-4">
        <div>
            <img src="{{ asset('assets/util_images/check_mark.png') }}" width="200" height="200">
        </div>
        <div class="thankingCon">Thank You For Visiting Our Website!</div>
        <div>
            We are getting started on your order right away and you will recieve an order confirmation email shortly.
            In the meantime, explore our new updates and get inspired by new trends!
        </div>
        <div class="backHomeAndDown">
            <a href="{{ route('home') }}" class="homeCon">
                <div>
                    <img src="{{ asset('assets/util_images/back_to_home.png') }}" width="40" height="40">
                </div>
                <div class="homelink">
                    Return To home
                </div>
            </a>
            {{-- @if (session('ebooks'))
                <div class="homeCon">
                    <div>
                        <img src="{{ asset('assets/util_images/ebookdown.png') }}" width="40" height="40">
                    </div>
                    <div>
                        <a href="{{ route('download') }}">Download Your Ebooks here!</a>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
</x-app-layout>
