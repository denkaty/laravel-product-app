<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $sort = htmlspecialchars($request->input('sort'));
        $searchTerm = htmlspecialchars($request->input('search'));

        $categories = [];

        if ($sort === 'name') {
            $categories = Category::orderBy('name')->get();
            return view('categories.index', compact('categories'));
        }

        if (empty($searchTerm)) {
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view('categories.index', compact('categories'));
        }

        if (!preg_match('/^[%_]+$/', $searchTerm)) {
            $categories = Category::search($searchTerm)->get();
        }

        return view('categories.index', compact('categories'));
    }
}
