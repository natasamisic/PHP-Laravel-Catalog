<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function submitComment(Request $request) {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);

        
        session()->flash('comment-success', 'Products loaded successfully!');
        return view('index');
    }
}
