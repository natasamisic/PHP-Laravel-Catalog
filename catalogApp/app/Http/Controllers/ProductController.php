<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function createProduct(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'required'
        ]);

        Product::create($fields);
        session()->flash('product-success', 'Product created successfully!');
        return view('/add-product');
    }
}
