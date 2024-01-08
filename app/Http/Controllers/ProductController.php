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
        $search = $request->input('search');
        if (empty($search)) {
            return redirect()->route('products.index');
        }
        $products = Product::search($search)->get();

        return view('products.search', ['products' => $products]);
    }
}
