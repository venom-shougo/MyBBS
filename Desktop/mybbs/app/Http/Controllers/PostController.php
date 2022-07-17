<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get(); 降順処理
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }

    // public function show($id)
    // {
    //     $post = Post::findOrFail($id);

    //     return view('posts.show')
    //         ->with(['post' => $post]);
    // }
// Implicit Bindingでコードを短く書く
    public function show(Post $post)
    {
        return view('posts.show')
            ->with(['post' => $post]);
    }

//createメソッド追加
    public function creste()
    {
        return view('posts.create');
    }
}
