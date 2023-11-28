<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        $comment = request()->validate([
            'body' => ['required', 'min:3', 'max:255']
        ]);

        $post->comments()->create([
            'body' => $comment['body'],
            'user_id' => auth()->id(),
        ]);

        return back();
    }

}
