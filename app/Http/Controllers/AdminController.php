<?php

namespace App\Http\Controllers;

use DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'books' => DB::table('books')->count(),
            'categories' => DB::table('categories')->count(),
            'authors' => DB::table('authors')->count()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
