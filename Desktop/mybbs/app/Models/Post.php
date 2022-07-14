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
}
