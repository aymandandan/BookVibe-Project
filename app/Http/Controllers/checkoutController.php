<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class checkoutController extends Controller
{
   public function index(Request $request){
      return view("checkout_Payment.checkout");
   }
   public function processCheckout(Request $request){
      //if all values are not empty btrd true yaane not fails aal validate
     $validate = Validator::make($request->all(),[
        "Name" => "required",
        "emailValue" => "required",
        "phone" => "required",
        "country" => "required",
        "city" => "required",
        "state" => "required",
        "zipCode" => "required",
        "creditCardNum" => "required"
     ]);

     //Auth::user();returns the current login user
     //auth()->id() haide returns the id of the current logged-in user
     $userId = auth()->id();
     if($validate->fails()){
       return view('checkout_Payment.checkout');
     }//here means that there is a missing means empty field not entered by the user
     else{
      //here bl $affected btrdle aadad l rows yle henne affected by this operation
      $affected = DB::table('users')
              ->where('id', '=',$userId)
              ->update(['phone'=>$request['phone'],'country'=>$request['country'],'city'=>$request['city'],'state'=>$request['state'],'zip_code' =>$request['zipCode'],'credit_card_nb'=>$request['creditCardNum']]);
              return redirect()->route('dashboard');
     }
   }
}
