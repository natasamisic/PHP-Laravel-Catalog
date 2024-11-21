<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        $comments = Comment::where('is_approved', true)->get();
        return view('index', compact('products', 'comments'));
    }

    //Product related methods
    public function createProduct(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'required'
        ]);

        $newProduct = Product::create($fields);
        $message = $newProduct ? 'Product created successfully!' : 'Failed to create the product!';
        session()->flash('product-success', $message);
        return view('admin.add-product');
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('/')->with('comment-success', 'Product not found!');
        }

        $product->delete();
        return redirect('/')->with('comment-success', 'Product deleted successfully!');
    }

    //Comment related methods
    public function showCommentsToApprove() {
        $comments = Comment::where('is_approved', false)->get();
        return view('admin.comments-to-approve', compact('comments'));
    }

    public function approveComment($id) {
        $comment = Comment::find($id);
        if (!$comment) {
            return redirect()->route('admin.commentsToApprove')->with('approve-success', 'Comment not found!');
        }

        $comment->is_approved = true;
        $approved = $comment->save();
        if(!$approved) {
            session()->flash('approve-success', 'Failed to approve comment!');
        }
        return redirect('show-comments-to-approve');
    }
}
