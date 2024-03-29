<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //Post 名前空間
use App\Models\Comment; //Comment 名前空間

class CommentController extends Controller
{
    public function store(Request $request, Post $post) //ストアメソッド
    {
        $request->validate([
            'body' => 'required', //コメントが空だった場合の処理
        ]);

        $comment = new Comment(); //commentモデル インスタンス
        $comment->post_id = $post->id; //外部キー制約でコメントするpostのidを持ってくる
        $comment->body = $request->body; //リクエストで渡ってきたbodyを使う
        $comment->save();

        return redirect() //投稿の詳細ページにリダイレクト
            ->route('posts.show', $post);
    }

    public function destroy(Comment $comment) //コメント削除機能
    {
        $comment->delete();

        return redirect()
            ->route('posts.show', $comment->post); //投稿画面にリダイレクト
    }
}
