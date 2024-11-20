<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        $comments = Comment::where('is_approved', true)->get();
        return view('index', compact('products', 'comments'));
    }

    public function createProduct(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'required'
        ]);

        $newProduct = Product::create($fields);
        $message = $newProduct ? 'Product created successfully!' : 'Failed to create the product!';
        session()->flash('product-success', $message);
        return view('/add-product');
    }
}
