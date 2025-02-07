<?php

namespace App\View\Components;

use Auth;
use DB;
use Illuminate\View\Component;
use Illuminate\View\View;

class CheckoutLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = DB::table('categories')->get();
        $cart_items_count = DB::table('carts')->where('user_id', '=', Auth::id())->sum('quantity');
        return view('layouts.checkout', ['categories' => $categories, 'cart_count' => $cart_items_count]);
    }
}
