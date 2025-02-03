<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistitems = Wishlist::where('user_id', Auth::id())
            ->with('book')
            ->get();

        return view("wishlist.index", compact('wishlistitems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $userId = Auth::id();

        // Check for existing entry
        if (Wishlist::where('user_id', $userId)
            ->where('book_id', $request->book_id)
            ->exists()) {
                return redirect()->back()
                ->withInput() // Preserves search filters
                ->with('wishlist_success', 'Book is already  added!');
        }

        // Create new wishlist item
        Wishlist::create([
            'user_id' => $userId,
            'book_id' => $request->book_id,
        ]);

        return redirect()->back()
                ->withInput() // Preserves search filters
                ->with('wishlist_success', 'Book added!');
    }

    public function destroy($id)
    {
        $wishlistItem = Wishlist::find($id);

        if (!$wishlistItem) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        if ($wishlistItem->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Book removed from wishlist!');
    }
}