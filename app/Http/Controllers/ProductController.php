<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');

        if ($sort === 'name') {
            $products = Product::orderBy('name')->get();
            return view('products.sort_by_name', compact('products'));
        }

        // Default order or other sorting logic if needed
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $searchTerm = htmlspecialchars($request->input('search'));
        if (empty($searchTerm)) {
            return redirect()->route('products.index');
        }
        if (preg_match('/^[%_]+$/', $searchTerm)) {
            return redirect()->route('products.index');
        }

        $products = Product::search($searchTerm)->get();

        return view('products.search', compact('products'));
    }
}
