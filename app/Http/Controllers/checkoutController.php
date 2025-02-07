<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class checkoutController extends Controller
{
   public function getCheckout(Request $request){
      return view("checkout_Payment.checkout",['nbOfItems'=>$request['nbOfItems'],'subTotal'=>$request['totalCost']]);
   }
   public function processPayWithAvail(Request $request){
      /*here first $request acts the same as $_POST super global associative array(since here we used POST method)
        so if we want to access any value entered by the user we use $request['Name'] (equivalence to $_POST['Name] in pure php) so here we access it by the key for each input field
        then we should validate every field in which it should not be empty so if the user enters values in all fields that have these values as keys the value places inside $validate will be true
        else false
      */
      $validate = Validator::make($request->all(),[
         "Name" =>"required",
         "emailValue" => "required",
         "phone" => "required",
         "country" => "required",
         "city" => "required",
         "state" => "required",
         "zipCode" => "required",
         "creditCardNum" => "required"
      ]);
      if($validate){
         //if the validation is true then we proceed to the next step(which is updating the values for the currently logged_in User)
         $userId = auth()->id();
         $affected = DB::table('users')
                     ->where('id', '=',$userId)
                     ->update(['phone' => $request['phone'],
                                       'country'=>$request['country'],
                                       'city'=>$request['city'],
                                       'state'=>$request['state'],
                                       'zip_code'=>$request['zipCode'],
                                       'credit_card_nb'=>$request['creditCardNum']]);

         $cartItems = DB::table('carts')
                      ->where('user_id','=',$userId)
                      ->join('books','carts.book_id','=','books.id')
                      ->select('carts.id as cartId',
                                        'carts.book_id as bookId',
                                        'carts.quantity as quantity',
                                        'books.title as bookTitle',
                                        'books.type as bookType',
                                        'books.stock_qty as stockQuantity',
                                        'books.file_path as filePath')
                      ->get();


         //if cart for this user is not empty
         $allAvailable = true;
         $outOfStock = [];    
         $downloadeBooks = []; 
         foreach($cartItems as $item){
            if($item->quantity > $item->stockQuantity){
               $outOfStock[] = $item->cartId;
               $allAvailable = false;
            }
         }
         if($allAvailable){
            //here all the items are present in the stock
            foreach($cartItems as $singleItem){
               DB::table('books')
                  ->where('id','=',$singleItem->bookId)
                  ->update(['stock_qty'=>$singleItem->stockQuantity-$singleItem->quantity]);

               DB::table('carts')
                  ->where('id','=',$singleItem->cartId)
                  ->delete();

               if($singleItem->bookType == 'e_book'){
                  $downloadeBooks[] = ['title'=>$singleItem->bookTitle,'filePath'=>$singleItem->filePath];
               }
            }
            //create a zip folder if there is ebooks in the cart
            //here we create the tool that is responsible for interacting with the zipFolder that we will create
            if(count($downloadeBooks)>0){
               $zipTool = new ZipArchive();
               //path where we will store our zip folder
               $zipFilePath = storage_path('storage/assets/ebooks_zip/ebook.zip');
               //here first tool is used to open this file located in the specified path
               //if it is created it will open it 
               //if it is not created it will first create the zipfolder inside the specified path and then open it
               if($zipTool->open($zipFilePath,ZipArchive::CREATE) === true){
                  foreach($downloadeBooks as $eBook){
                     //here since we are placing each item as associative arrayy by our hands so i will access each value using ['']
                     $ebookTitle = $eBook['title'];
                     $ebookPath = $eBook['filePath'];
                     if(file_exists($ebookPath)){
                        $zipTool->addFile($ebookPath,$ebookTitle.'pdf');
                     }
                  }
                  //here we close the zipfolder using the zipTool since we use it to interact with our zipfolder
                  $zipTool->close();
               }
            }
            if(count($downloadeBooks) > 0 ){
               return redirect()->route('confirmPage')->with('ebooks','present');
            }
            else{
               //here means we all books are hardbooks so no need to create a button to download the ebooks
               return redirect()->route('confirmPage');
            }
         }
         else{
            //here not all items are available (we have items out of stock)
            foreach($outOfStock as $item){
               DB::table('carts')
                 ->where('id','=',$item)
                 ->delete();
            }
            //with() function stores inside session array a key-value pair so to access the value we use session('key') equivalence to $_SESSION('key') in pure php
            return redirect()->route('cart.Page')->with('error','some items were out of stock and have been removed from the cart');
         }
      }
   }
   public function downloadFiles(){
      //so here already we created a zip folder in this path so we return a pointer to the zip folder
      $zipFilePath = storage_path('storage/assets/ebooks_zip/ebook.zip');
        
      if (file_exists($zipFilePath)) {
          return response()->download($zipFilePath)->deleteFileAfterSend(true);
      } 
   }
}
