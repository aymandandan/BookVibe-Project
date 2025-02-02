<div class="flex flex-col gap-4">
    @forelse ($wishlistitems as $item)
      <div id="wishlist-item-{{ $item->id }}" class="bg-white grid grid-cols-[300px_1fr_1fr_auto] gap-6 rounded-lg py-4 px-3 w-auto h-[150px] shadow-lg">
        <!-- Image Container -->
        <div class="flex items-center justify-center bg-gray-100 p-0.5 rounded-sm">
          <img alt="book cover" src="{{ asset('storage/' . $item->book->cover_img) }}" class="w-full h-full object-cover rounded-sm" />
        </div>
  
        <!-- Text Container -->
        <div class="flex flex-col justify-center">
          <!-- Book Name -->
          <h3 class="text-2xl font-semibold text-gray-800">{{ $item->book->title }}</h3>
          <!-- Book Author -->
          <p class="text-sm text-gray-600">{{ $item->book->author_name }}</p>
          <p class="text-sm text-gray-600">{{ $item->book->type }}</p>
        </div>
  
        <!-- Description Container -->
        <div class="flex flex-col justify-center">
          <h3 class="text-lg font-semibold text-gray-800">{{ $item->book->description }}</h3>
        </div>
  
        <!-- Button and Image 2 Container -->
        <div class="flex items-center justify-end gap-4">
          <!-- Button Container -->
          <div class="flex flex-col items-center gap-2">
            <form class="w-full">
              <button class="w-full bg-primary-500 rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150">
                {{ __('ADD TO CART') }}
              </button>
            </form>
            <!-- Image 1 -->
            <img src="/images/image1.png" class="w-[20px] h-[20px] scale-105 hover:scale-110 transition-transform" />
          </div>
  
          <!-- Image 2 Container (Delete Button) -->
          <div class="flex items-center justify-center">
            <img onclick="event.preventDefault(); deleteFromWishlist({{ $item->id }})" src="/images/image.png" class="w-[40px] h-[40px] scale-105 hover:scale-110 transition-transform" />
          </div>
        </div>
      </div>
    @empty
      <p class="text-center text-gray-600">Your wishlist is empty.</p>
    @endforelse
  </div>
  
  <script>
    function deleteFromWishlist(wishlistItemId) {
      if (confirm("Are you sure you want to remove this book from your wishlist?")) {
        fetch(`/wishlist/${wishlistItemId}`, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Book removed from wishlist!');
            // Remove the item from the UI
            document.getElementById(`wishlist-item-${wishlistItemId}`).remove();
          } else {
            alert('Failed to remove book from wishlist.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      }
    }
  </script>