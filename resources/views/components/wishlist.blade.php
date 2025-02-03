<div class="flex flex-col gap-4">
  @forelse ($wishlistitems as $item)
      <div id="wishlist-item-{{ $item->id }}" class="bg-white flex items-center justify-between gap-6 rounded-lg py-4 px-3 w-auto h-[150px] shadow-lg">
          <!-- Left Section: Image and Text -->
          <div class="flex items-center gap-6 flex-grow">
              <!-- Image Container -->
              <div class="w-[200px] h-[150px] flex items-center justify-center bg-gray-100 p-0.5 rounded-sm flex-shrink-0">
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
          </div>

          <!-- Middle Section: Additional Text -->
          <div class="flex flex-col justify-center flex-grow">
              <h3 class="text-lg font-semibold text-gray-800">e repellat molestiae exercitationem cum, laudantium nam.</h3>
          </div>

          <!-- Right Section: Button and Image 2 -->
          <div class="flex items-center gap-4 flex-shrink-0">
              <!-- Button Container -->
              <div class="flex flex-col items-center gap-2 justify-center">
                  <form class="w-full">
                      <button class="w-full bg-primary-500 rounded-xl shadow text-grey-100 py-1 sm:px-1 px-2 hover:bg-primary-400 hover:text-white transition ease-in-out duration-150">
                          {{ __('ADD TO CART') }}
                      </button>
                  </form>
                  <!-- Image 1 -->
                  <img src="/assets/util_images/heart_image.png" class="w-[20px] h-[20px] scale-105 hover:scale-110 transition-transform" />
              </div>

              <!-- Image 2 Container -->
              <div class="flex items-center justify-center">
                  <img src="/assets/util_images/delete_icon.png" onclick="deleteFromWishlist({{ $item->id }})" class="w-[40px] h-[40px] scale-105 hover:scale-110 transition-transform" />
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