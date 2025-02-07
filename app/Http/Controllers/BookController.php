<?php

namespace App\Http\Controllers;

use App\Models\Book;
use DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('books.search');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get()->all();
        $authors = DB::table('authors')->get()->all();
        return view('books.add', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'cover_img' => ['nullable', 'file', 'image'],
            'page_nb' => ['nullable', 'numeric', 'gte:0'],
            'price' => ['nullable', 'numeric', 'gte:0'],
            'stock_qty' => ['nullable', 'numeric', 'gte:0'],
            'size' => ['nullable', 'numeric', 'gte:0'],
            'category_id' => ['numeric'],
            'author_id' => ['numeric'],
            'type' => ['string'],
            'publish_date' => ['nullable'],
            'publisher' => ['nullable'],
            'language' => ['nullable'],
            'dimensions' => ['nullable'],
            'format' => ['nullable'],
            'file_path' => ['nullable', 'file'],
        ]);

        if (!$data['page_nb'])
            $data['page_nb'] = 1;

        if (!$data['price'])
            $data['price'] = 0;

        if (!$data['stock_qty'])
            $data['stock_qty'] = 0;

        if (!$data['page_nb'])
            $data['page_nb'] = 1;

        if ($request->hasFile('cover_img')) {
            $img = $request->file('cover_img');
            $path = $img->store('assets/pictures/BookCovers', 'public'); // Store in storage/app/public
            $data['cover_img'] = 'storage/' . $path; // Path is relative to storage/app/public
        }

        if ($request->hasFile('file_path')) {
            $img = $request->file('file_path');
            $path = $img->store('assets/files/eBooks', 'public'); // Store in storage/app/public
            $data['file_path'] = 'storage/' . $path; // Path is relative to storage/app/public
        }

        DB::table('books')->insert($data);

        return redirect()->route('book.show', $data['id']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book_details = DB::table('books', 'b')
            ->where('b.id', '=', $id)
            ->get()->first();
        $author = DB::table('authors', 'a')
            ->where('a.id', '=', $book_details->author_id)
            ->get()->first();
        $category = DB::table('categories', 'c')
            ->where('c.id', '=', $book_details->category_id)
            ->get()->first();

        // For recommended similar books (same author or category) only get 10
        $other_books = DB::table('books', 'b')
            ->join('authors as a', 'b.author_id', '=', 'a.id')
            ->join('categories as c', 'b.category_id', '=', 'c.id')
            ->where('c.id', '=', $book_details->category_id)
            ->orWhere('a.id', '=', $book_details->author_id)
            ->select('b.id', 'b.title', 'b.cover_img')
            ->paginate(10);

        if ($book_details) {
            return view('books.details', [
                'book' => $book_details,
                'author' => $author,
                'category' => $category,
                'other_books' => $other_books
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
