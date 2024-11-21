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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        
            $product = new Product();
            $product->title = $fields['title'];
            $product->short_description = $fields['short_description'];
            $product->image =  'images/'.$imageName;
            $newProduct = $product->save();
    
            if(!$newProduct) {
                session()->flash('product-error', 'Failed to create the product!');
            }else {
                session()->flash('product-success', 'Product created successfully!');
            }
        } else {
            session()->flash('product-error', 'No valid image file uploaded!');
        }
        
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
