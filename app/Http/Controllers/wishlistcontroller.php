<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistitems = DB::table('wishlists', 'w')
            ->where('w.user_id', '=', Auth::id())
            ->join('books as b', 'b.id', '=', 'w.book_id')
            ->join('authors as a', 'b.author_id', '=', 'a.id')
            ->select('b.*', 'a.name as author_name', 'w.id as wish_id')
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
        if (
            Wishlist::where('user_id', $userId)
                ->where('book_id', $request->book_id)
                ->exists()
        ) {
            return redirect()->back()
                ->withInput() // Preserves search filters
                ->with('success', 'Book is already  added!');
        }

        // Create new wishlist item
        Wishlist::create([
            'user_id' => $userId,
            'book_id' => $request->book_id,
        ]);

        return redirect()->back()
            ->withInput() // Preserves search filters
            ->with('success', 'Book added to wishlist!');
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
