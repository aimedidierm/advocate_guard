<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user', 'likes'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);
        Post::create(['user_id' => Auth::id(), 'content' => $request->content]);
        return redirect()->back();
    }

    public function like(Post $post)
    {
        $user = Auth::user();

        $existingLike = $post->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }

        return redirect()->back();
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate(['content' => 'required']);
        $post->comments()->create(['user_id' => Auth::id(), 'content' => $request->content]);
        return redirect()->back();
    }
}
