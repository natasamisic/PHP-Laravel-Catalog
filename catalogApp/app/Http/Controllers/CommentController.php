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
