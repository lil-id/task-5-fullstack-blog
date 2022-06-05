<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all post
    public function index() {
        return view('blog', [
            "title" => "All Post",
            "active" => "blog",
            "posts" => Post::with(['author', 'category'])->latest()->get()
        ]);
    }

    // get 1 post
    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }
}
