<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;

//mostly used with forms so hon Request $request($request acts as a $_POST so feene oul $request['quantity'] eza ken aande input aande name='quantity')

class AuthorController extends Controller
{
    public function getAuthor(int $id)
    {
        /*hon l model is used to apply sql queries in easy way
          so here l Eloquent will transform it to the normal sql query
          so the MySQL engine will perform this query and return the result(Here as if we are saying Select* from Authors)
          $authors = Author::all();*/
        $authorInfo = DB::table('authors')
            ->where('id', '=', $id)
            ->first();

        $result = DB::table('books')
            ->where('books.author_id', '=', $id)
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select(
                'books.id as bookId',
                'books.title as title',
                'books.type as type',
                'books.cover_img as coverImg',
                'books.price as bookPrice',
                'authors.id as authorId',
                'authors.name as authName',
                'authors.about as authAbout'
            )
            ->get();
        return view('Authors.author', ['authorDetails' => $result, 'authName' => $authorInfo->name, 'authAbout' => $authorInfo->about]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $authors = Author::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%");
        })
            ->paginate(10);

        return view('admin.authors.index', compact('authors', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:authors,name,' . ($author->id ?? ''),
            'about' => 'nullable|string|max:2000'
        ]);

        Author::create($validated);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.authors.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:authors,name,' . ($author->id ?? ''),
            'about' => 'nullable|string|max:2000'
        ]);

        $author->update($validated);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author deleted successfully');
    }
}
