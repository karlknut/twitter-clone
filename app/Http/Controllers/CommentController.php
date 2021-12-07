<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|max=255',
            'tweetid' => 'required|numeric'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'text' => $request->text,
            'tweets_id' => $request->tweetid
        ]);

        return redirect("/tweets/$request->tweetid");
    }
}
