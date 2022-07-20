<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', ['App\Http\Controllers\PostController', 'index']);
// ⬆︎配列でクラス名とメソッド名を名前空間で取得する
// Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
// ⬆︎use にすれば短くかける
Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');
// ルーティングに名前をつけてURLの変化に対応する
// Route::get('/posts/{id}', [PostController::class, 'show'])
//     ->name('posts.show');
// URLにパラメータ(id)を付けるルーティング。
// Implicit Bindingでコードを短く書く
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show')
    ->where('post', '[0-9]+'); //{post}は0~9整数を受け付ける、createメソッドにジャンプさせる

//posts.createのURLにアクセスしたらPostControllerのcreateメソッドを呼び出す
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

//投稿保存処理
Route::post('/posts/store', [PostController::class, 'store'])
    ->name('posts.store');

//投稿の編集処理
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')
    ->where('post', '[0-9]+');

//データを更新する処理を実装(一部データの更新はpatch形式)
Route::patch('/posts/{post}/update', [PostController::class, 'update'])
    ->name('posts.update')
    ->where('post', '[0-9]+');

//投稿削除機能
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->where('post', '[0-9]+');
