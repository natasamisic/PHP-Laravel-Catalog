<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class AdminController extends Controller
{

    //Product related methods
    public function createProduct(Request $request) {
        $fields = $request->validate([
            'title' => 'required|string|min:3|max:50',
            'short_description' => 'required|string|min:10|max:255',
            'image' => 'required|string|max:500'
        ]);

        $newProduct = Product::create($fields);
  
        if(!$newProduct) {
            session()->flash('product-error', 'Failed to create the product!');
            return redirect('/add-product')->withInput();
        }
        
        session()->flash('product-success', 'Product created successfully!');
        return redirect('/add-product');
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
