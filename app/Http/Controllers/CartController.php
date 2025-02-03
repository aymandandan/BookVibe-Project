<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        //here i want to get the id of the currently logged-in user
        $userId = auth()->id();
        //here we make the join operation between carts and books to get all the information related for the books
        $carts_BookRecords = DB::table('carts')->join('books','carts.book_id','=','books.id')
        //here we take only the books realted to the logged-in user
        ->where('carts.user_id','=',$userId)
        ->select('carts.id as cartId','carts.book_id as book_id','carts.user_id as user_id','carts.quantity as quantity','books.title as book_title','books.description as description','books.type as type','books.price as priceBook','books.cover_img as coverImage','books.type as bookType')->get();
        $totalPriceCart = 0;
        foreach($carts_BookRecords as $item){
            $item->totalPrice = $item->quantity*$item->priceBook;
            $totalPriceCart += $item->totalPrice;
        }
        //here we return the result
        return view('Cart.cart',['cartsBookRecords'=>$carts_BookRecords,'totalCost'=>$totalPriceCart]);
    }

    public function destroy(int $id){
        //hon b alb l $deleted bynhat number of affected rows yle heyye 1
        $deleted = DB::table('carts')
                   ->where('id', '=', $id)
                   ->delete();
                   return redirect()->route('cart.Page');
    }

    //here when we click on the add To cart button from description page or home page rah nkun nehna already be3teen kl l books yle b alb l book table eza aal home page aw b alb l description page mnkun be3teen l id lal book yle bdna naamellu browse la details yle elu so bkun be3te bl anchor tag l id lal book w same b alb lhome page kl card aam tmru2 b alb l foreach aam ykun fe b alba l id lal book
    public function insert(int $id){
        $userId = auth()->id();
        $cartRecord = DB::table('carts')
                      ->where('book_id', '=', $id)
                      ->where('user_id', '=', $userId)
                      ->get();
        if($cartRecord->isEmpty()){
            DB::table('carts')->insert([
                'user_id' => $userId,
                'book_id' => $id,
                'quantity'=>1
            ]);
        }
        return redirect()->back();
    }

    public function updateQuantity(Request $request,int $id){
        $userId = auth()->id();
        $quantity = $request['quantity'];
        $affected = DB::table('carts')
              ->where('book_id', '=',$id)
              ->where('user_id','=',$userId)
              ->update(['quantity' => $quantity]);
        return redirect()->route('cart.Page');
    }
}
