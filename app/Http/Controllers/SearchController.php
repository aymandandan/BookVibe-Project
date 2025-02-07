<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get("search_input");
        Session::put('search_type', 'normal');

        if ($search) {
            $books = DB::table('books as b')
                ->join('categories as c', 'c.id', '=', 'b.category_id')
                ->join('authors as a', 'a.id', '=', 'b.author_id')
                ->select('b.*', 'c.name as category_name', 'a.name as author_name')
                ->where('b.title', 'like', '%' . $search . '%')
                ->orWhere('b.description', 'like', '%' . $search . '%')
                ->orWhere('b.type', 'like', '%' . $search . '%')
                ->orWhere('a.name', 'like', '%' . $search . '%')
                ->orWhere('c.name', 'like', '%' . $search . '%')
                ->paginate(15);
            $books->appends(['search_input' => $search]);
        } else {
            $books = DB::table('books as b')
                ->join('categories as c', 'c.id', '=', 'b.category_id')
                ->join('authors as a', 'a.id', '=', 'b.author_id')
                ->select('b.*', 'c.name as category_name', 'a.name as author_name')
                ->paginate(15);
        }

        return view("books.search-page", compact('books'));
    }

    public function searchCategory(Request $request)
    {
        $category = urldecode($request->get('special_search_value'));
        Session::put('search_type', 'category');
        Session::put('search_category', $category);

        $books = DB::table('books as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->join('authors as a', 'a.id', '=', 'b.author_id')
            ->select('b.*', 'c.name as category_name', 'a.name as author_name')
            ->where('c.name', 'like', $category)
            ->paginate(15)
            ->appends(['special_search_value' => $category]);

        return view('books.search-page', compact('books'));
    }

    public function searchType(Request $request)
    {
        $book_type = $request->get('special_search_value');
        Session::put('search_type', 'book_type');
        Session::put('search_book_type', $book_type == 'e_book' ? "eBooks" : "Hard Books");

        $books = DB::table('books as b')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->join('authors as a', 'a.id', '=', 'b.author_id')
            ->select('b.*', 'c.name as category_name', 'a.name as author_name')
            ->where('b.type', '=', $book_type)
            ->paginate(15)
            ->appends(['special_search_value' => $book_type]);

        return view('books.search-page', compact('books'));
    }
}
