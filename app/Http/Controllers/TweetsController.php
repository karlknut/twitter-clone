<?php

namespace App\Http\Controllers;

use App\Models\tweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = tweets::join('users', 'users.id', '=', 'tweets.user_id')
            ->select('tweets.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tweets.index', ['tweets' => $tweets]);
    }

    public function create()
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }

        return view('tweets.create');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $request->validate([
            'text' => 'required|max:255'
        ]);

        tweets::create([
            'text' => $request->text,
            'user_id' => 1
        ]);

        return redirect('/Models/tweets');
    }

    public function show($id)
    {
        $tweet = tweets::find($id);
        return view('tweets.show', ['tweet' => $tweet]);
    }

    public function edit($id)
    {
        $tweet = tweets::find($id);

        return view('tweets.edit', ['tweet' => $tweet]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|max:255'
        ]);

        $tweet = tweets::find($id);
        $tweet->text = $request->text;
        $tweet->save();

        return redirect("/Models/tweets/$id");
    }

    public function destroy($id)
    {
        tweets::where(['id' => $id])->delete();

        return redirect('/Models/tweets');
    }
}