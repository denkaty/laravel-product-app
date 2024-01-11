<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = htmlspecialchars($request->input('sort'));
        $searchTerm = htmlspecialchars($request->input('search'));

        $products = [];

        if ($sort === 'name') {
            $products = Product::orderBy('name')->get();
            return view('products.index', compact('products'));
        }

        if (empty($searchTerm)) {
            $products = Product::orderBy('created_at', 'desc')->get();
            return view('products.index', compact('products'));
        }

        if (!preg_match('/^[%_]+$/', $searchTerm)) {
            $products = Product::search($searchTerm)->get();
        }

        return view('products.index', compact('products'));
    }
}
