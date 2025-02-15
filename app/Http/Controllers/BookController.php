<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Storage;

class BookController extends Controller
{
    private $defaultCover = 'storage/assets/pictures/BookCovers/Default_Img_Cover.jpg';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::with('author')
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%$search%");
            })
            ->paginate(10);

        return view('admin.books.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $authors = DB::table('authors')->get();
        return view('admin.books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->getValidationRules());

        // Handle file uploads
        $validated['cover_img'] = $this->handleCoverImage($request);
        $validated['file_path'] = $this->handleEbookFile($request, $validated['type']);

        // Handle type-specific field cleanup
        $this->handleTypeSpecificFields($validated);

        // Create the book
        $book = Book::create($validated);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Eager load relationships (if you add relationships later)
        $book->load(['author', 'category']);

        // Get related data using raw queries
        $author = DB::table('authors')
            ->where('id', $book->author_id)
            ->first();

        $category = DB::table('categories')
            ->where('id', $book->category_id)
            ->first();

        // Get similar books (excluding current book)
        $similarBooks = DB::table('books')
            ->where(function ($query) use ($book) {
                $query->where('category_id', $book->category_id)
                    ->orWhere('author_id', $book->author_id);
            })
            ->where('id', '!=', $book->id)
            ->select('id', 'title', 'cover_img', 'price')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('books.details', [
            'book' => $book,
            'author' => $author,
            'category' => $category,
            'similarBooks' => $similarBooks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = DB::table('books')->find($id);
        if (!$book) {
            abort(404);
        }

        $categories = DB::table('categories')->get();
        $authors = DB::table('authors')->get();

        return view('admin.books.create', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate($this->getValidationRules());

        // Handle file uploads/deletions
        $validated['cover_img'] = $this->handleCoverImage($request, $book);
        $validated['file_path'] = $this->handleEbookFile($request, $validated['type'], $book);

        // Handle checkbox for file removal
        if ($request->has('remove_file')) {
            $this->deleteFileIfExists($book->file_path);
            $validated['file_path'] = null;
        }

        // Handle type-specific field cleanup
        $this->handleTypeSpecificFields($validated, $book);

        // Update the book
        $book->update($validated);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Delete associated files (except default cover)
        $this->deleteFileIfExists($book->cover_img);
        $this->deleteFileIfExists($book->file_path);

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully');
    }

    private function getValidationRules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'page_nb' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'cover_img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date',
            'publisher' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'type' => 'required|in:hard_book,e_book',
            'dimensions' => 'nullable|string|max:255',
            'stock_qty' => 'required_if:type,hard_book|nullable|integer|min:0',
            'size' => 'required_if:type,e_book|nullable|numeric|min:0',
            'format' => 'nullable|string|max:10',
            'file_path' => 'nullable|file|mimetypes:application/pdf,application/epub+zip'
        ];

        return $rules;
    }

    private function handleTypeSpecificFields(array &$validated, ?Book $book = null): void
    {
        if ($validated['type'] === 'hard_book') {
            $validated['size'] = null;
            $validated['format'] = null;
            // Remove eBook file if changing from eBook to hardcover
            if ($book && $book->type === 'e_book') {
                $this->deleteFileIfExists($book->file_path);
                $validated['file_path'] = null;
            }
        } else {
            $validated['dimensions'] = null;
            $validated['stock_qty'] = null;
        }
    }

    private function handleCoverImage(Request $request, ?Book $book = null): string
    {
        // Handle cover image removal
        if ($request->has('remove_cover')) {
            $this->deleteFileIfExists($book?->cover_img);
            return $this->defaultCover;
        }

        if ($request->hasFile('cover_img')) {
            $path = $request->file('cover_img')->store(
                'assets/pictures/BookCovers',
                'public'
            );

            // Delete old cover if exists
            if ($book && $book->cover_img !== $this->defaultCover) {
                $this->deleteFileIfExists($book->cover_img);
            }

            return 'storage/' . $path;
        }

        return $book->cover_img ?? $this->defaultCover;
    }

    private function handleEbookFile(Request $request, string $type, ?Book $book = null): ?string
    {
        // Only handle files for eBooks
        if ($type !== 'e_book') {
            if ($book?->file_path) {
                $this->deleteFileIfExists($book->file_path);
            }
            return null;
        }

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store(
                'assets/files/eBooks',
                'public'
            );

            // Delete old file if exists
            if ($book?->file_path) {
                $this->deleteFileIfExists($book->file_path);
            }

            return 'storage/' . $path;
        }

        return $book->file_path ?? null;
    }

    private function deleteFileIfExists(?string $path): void
    {
        if (!$path || $path === $this->defaultCover) {
            return;
        }

        // Remove 'storage/' prefix to get correct path
        $relativePath = str_replace('storage/', '', $path);

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }
}
