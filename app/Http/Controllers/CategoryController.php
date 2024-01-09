<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');

        if ($sort === 'name') {
            $categories = Category::orderBy('name')->get();
            return view('categories.sort_by_name', compact('categories'));
        }

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = htmlspecialchars($request->input('search'));
        if (empty($searchTerm)) {
            return redirect()->route('categories.index');
        }
        if (preg_match('/^[%_]+$/', $searchTerm)) {
            return redirect()->route('categories.index');
        }

        $categories = Category::search($searchTerm)->get();

        return view('categories.search', compact('categories'));
    }
}
