<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request; //mostly used with forms so hon Request $request($request acts as a $_POST so feene oul $request['quantity'] eza ken aande input aande name='quantity')

class AuthorController extends Controller
{
    public function getAuthor(int $id){
      /*hon l model is used to apply sql queries in easy way
        so here l Eloquent will transform it to the normal sql query
        so the MySQL engine will perform this query and return the result(Here as if we are saying Select* from Authors)
        $authors = Author::all();*/
        $authorInfo = DB::table('authors')
                      ->where('id', '=', $id)
                      ->first();
        
        $result = DB::table('books')
                  ->where('author_id','=',$id)
                  ->join('authors','books.author_id','=','authors.id')
                  ->select('books.id as bookId,books.title as title,book.type as type,authors.id as authorId,authors.name as authName,authors.about as authAbout')
                  ->get();
        return view('Authors.author',['authorDetails'=>$result,'authName'=>$authorInfo->name,'authAbout'=>$authorInfo->about]);
    }
}