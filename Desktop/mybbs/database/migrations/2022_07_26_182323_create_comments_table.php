<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\ReferenceParser;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); //postsテーブルのidカラムに紐付け
            $table->string('body'); //bodyカラムを追加
            $table->timestamps();
            $table
                ->foreign('post_id') //外部キー制約
                ->reference('id')
                ->on('posts')
                ->onDelete('cascade'); //postsレコード削除で関連するコメント削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
