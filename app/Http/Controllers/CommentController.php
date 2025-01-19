<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['comment_text' => 'required']);

        $post->comments()->create([
            'comment_text' => $request->comment_text,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
       /// $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
       // $this->authorize('update', $comment);

        $request->validate(['comment_text' => 'required']);
        $comment->update(['comment_text' => $request->comment_text]);

        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        //$this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment deleted successfully.');
    }
}

