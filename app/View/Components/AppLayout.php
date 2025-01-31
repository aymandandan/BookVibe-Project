<?php

namespace App\View\Components;

use DB;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = DB::table('categories')->get();
        return view('layouts.app', ['categories' => $categories]);
    }
}
