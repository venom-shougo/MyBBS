<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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
    public function store(PostRequest $request)
    {
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
    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body  = $request->body;
        $post->save();

        //データ更新後に詳細ページに飛ばす
        return redirect()
             ->route('posts.show', $post);
    }

//投稿削除機能
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
             ->route('posts.index');
    }
}
