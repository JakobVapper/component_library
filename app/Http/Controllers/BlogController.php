<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function dashboard()
    {
        try {
            $posts = Post::latest('published_at')
                ->whereNotNull('published_at')
                ->paginate(10);
            
            if ($posts->total() == 0) {
                $posts = Post::latest('created_at')->paginate(10);
            }
        } catch (\Exception $e) {
            $posts = new \Illuminate\Pagination\LengthAwarePaginator(
                collect([]), 0, 10
            );
        }
        
        return view('dashboard', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}