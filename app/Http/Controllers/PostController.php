<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
               // Get the selected category from the request
               $category = $request->input('category');

               // Query posts with optional category filtering
               $posts = Post::with('user', 'comments')
               ->when($category, function ($query, $category) {
                   return $query->where('category', $category);
               })
               ->latest()
               ->paginate(2);

               // Pass the filtered posts to the view
               return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
