<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submitComment(Request $request) {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);

        $newComment = Comment::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'text' => $fields['text'],
            'is_approved' => false, 
        ]);

        $message = $newComment ? 'Comment created successfully!' : 'Failed to submit the comment!';
        session()->flash('comment-success', $message);
        return redirect('/');
    }
}
