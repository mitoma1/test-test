<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;

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

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

// お問い合わせフォームページ表示
Route::get('/form', [ContactController::class, 'showForm'])->name('contact.form');

// お問い合わせ内容の確認ページ表示（GETリクエスト）
Route::get('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 確認フォーム送信（POSTリクエスト）
Route::post('/confirm', [ContactController::class, 'confirmPost'])->name('contact.confirm.post');

// データ保存（POSTリクエスト）
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');

// 完了ページ（サンクスページ）を表示
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
// ユーザー認証関連（Fortifyを利用する場合）
Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::loginView(function () {
    return view('auth.login');
});

// ログイン・ログアウト
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 管理画面
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
