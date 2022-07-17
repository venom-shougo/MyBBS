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
    public function create()
    {
        return view('posts.create');
    }

//投稿保存処理、バリデーション処理
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3', //入力必須、最低3文字
            'body'  => 'required', //入力必須
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();

        //DB処理後リダイレクト先をルーティング名で指定
        return redirect()
            ->route('posts.index');
    }
}
