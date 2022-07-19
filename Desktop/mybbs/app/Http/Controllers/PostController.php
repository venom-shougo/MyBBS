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
        ],[ //エラーメッセージを日本語化
            'title.required' => 'タイトルを入力してください',
            'title.min'      => ':min 文字以上入力してください',
            'body.required'  => '本文を入力してください'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();

        //DB処理後リダイレクト先をルーティング名で指定
        return redirect()
            ->route('posts.index');
    }

//投稿編集処理
    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

//投稿編集機能を完成
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3', //入力必須、最低3文字
            'body'  => 'required', //入力必須
        ],[ //エラーメッセージを日本語化
            'title.required' => 'タイトルを入力してください',
            'title.min'      => ':min 文字以上入力してください',
            'body.required'  => '本文を入力してください'
        ]);

        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();

        //データ更新後に詳細ページに飛ばす
        return redirect()
            ->route('posts.show', $post);
    }
}
