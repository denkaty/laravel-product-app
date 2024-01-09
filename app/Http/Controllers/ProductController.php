<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
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
