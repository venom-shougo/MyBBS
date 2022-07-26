<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post -> posts テーブルに紐付けてくれる
class Post extends Model
{
    use HasFactory;

    //MassAssignment値をどのカラムに挿入するか設定
    protected $fillable = [
        'title',
        'body',
    ];

    //Comment モデルと Post モデルの間にリレーションを設定して、関連するデータを簡単に操作できるようにする
    //view に $post と言うデータを渡した場合 $post->comments で紐付けし関連するコメントを取得する
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
