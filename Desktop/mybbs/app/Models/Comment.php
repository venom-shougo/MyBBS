<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
//fillable設定
    protected $fillable = [
        'post_id',
        'body',
    ];

    //comment に関連するpost を取得する $comment->post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
