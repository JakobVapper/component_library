<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function dashboard()
{
    // Get published posts, but fallback to all posts if none are published
    $posts = Post::latest('published_at')
        ->whereNotNull('published_at')
        ->paginate(10);
    
    // If no published posts exist, show all posts
    if ($posts->total() == 0) {
        $posts = Post::latest('created_at')->paginate(10);
    }
        
    return view('dashboard', compact('posts'));
}

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}