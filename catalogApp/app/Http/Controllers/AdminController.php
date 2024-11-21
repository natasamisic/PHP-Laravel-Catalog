<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9, ['*'], 'product_pages');
        $comments = Comment::where('is_approved', true)->get();
        $comments = Comment::paginate(5, ['*'], 'comment_pages');
        return view('index', compact('products', 'comments'));
    }

    //Product related methods
    public function createProduct(Request $request) {
        $fields = $request->validate([
            'title' => 'required|string|min:3|max:50',
            'short_description' => 'required|string|min:10|max:255',
            'image' => 'required|string|max:500'
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
            return redirect()->route('admin.commentsToApprove')->with('approve-error', 'Something went wrong!');
        }

        $comment->is_approved = true;
        $approved = $comment->save();
        if(!$approved) {
            session()->flash('approve-error', 'Failed to approve comment!');
        }else {
            session()->flash('approve-success', 'Comment approved!');
        }
        return redirect('show-comments-to-approve');
    }
}
