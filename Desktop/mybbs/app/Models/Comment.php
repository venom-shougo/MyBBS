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
}
