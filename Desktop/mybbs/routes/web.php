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
    ->name('posts.show');
