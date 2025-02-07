<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class homecontroller extends Controller
{
    public function index(){
       
        $books = DB::table("books as b")
        ->join('categories as c', 'c.id', '=', 'b.category_id')
        ->join('authors as a', 'a.id', '=', 'b.author_id')
        ->select('b.*', 'c.name as category_name', 'a.name as author_name','a.id as authorId')
        ->inRandomOrder()
      
        ->limit(10) // Fetch only 10 books
        ->get();


        return view("home.index", compact('books'));
    }
    public function about(){

    }
}
