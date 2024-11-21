<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $products = Product::paginate(9, ['*'], 'product_pages');
        $comments = Comment::where('is_approved', true)->get();
        $comments = Comment::paginate(5, ['*'], 'comment_pages');
        return view('index', compact('products', 'comments'));
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        if (auth()->attempt(['name' => $fields['name'], 'password' => $fields['password']])) {
            $request->session()->regenerate();
            return redirect('/');    
        }
        session()->flash('login-error', 'Username or password is wrong! Try again!');
        return redirect('/loginPage')->withInput();
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:3'
        ]);

        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        if(!$user) {
            session()->flash('register-error', 'Something went wrong. Account was not created!');
            return redirect('/registerPage')->withInput();
        }
        auth()->login($user);
        return redirect('/');
    }

    public function submitComment(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string|max:500'
        ]);

        $newComment = Comment::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'text' => $fields['text'],
            'is_approved' => false, 
        ]);

        if(!$newComment) {
            session()->flash('comment-error', 'Failed to submit the comment!');
            return redirect('/')->withInput();
        }
        
        session()->flash('comment-success', 'Comment submitted successfully!');
        return redirect('/');
    }
}
