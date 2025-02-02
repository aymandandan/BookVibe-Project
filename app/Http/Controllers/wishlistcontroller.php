<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class wishlistcontroller extends Controller
{
    public function index(){
        $wishlistitems=Wishlist::where('user_id',Auth::id())
        ->with('book')
        ->get();
      
       
    return view("wishlist.index",compact('wishlistitems'));
}
public function store(Request $request){
     // Validate the request
    // Validate the request
    $request->validate([
        'book_id' => 'required|exists:books,id',
    ]);
       // Get the authenticated user's ID
       $userid=Auth::id();
        // Check if the book is already in the wishlist
        $existinginwishlist=Wishlist::where("user_id",$userid)
        ->where('book_id', $request->book_id)
        ->first();
        if($existinginwishlist){
            return response()->json(['success' => false, 'message' => 'Book is already in your wishlist.']);
        }
           // Add the book to the wishlist
           Wishlist::create([
            'user_id' => $userid,
            'book_id' => $request->book_id,
        ]);
        return response()->json(['success'=> true,'message'=> 'book is added to wishlist']);
}
public function destroy($id)
{
    // Find the wishlist item
    $wishlistItem = Wishlist::find($id);

    // Check if the item exists and belongs to the authenticated user
    if ($wishlistItem && $wishlistItem->user_id == Auth::id()) {
        $wishlistItem->delete();
        return response()->json(['success' => true, 'message' => 'Book removed from wishlist!']);
    }

    return response()->json(['success' => false, 'message' => 'Failed to remove book from wishlist.'], 404);
}
}
