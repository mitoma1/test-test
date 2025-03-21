<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
<<<<<<< HEAD
use App\Http\Controllers\Auth\RegisterController;

use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
=======
>>>>>>> a6eab46c3a2501eaeeadcf98623c369db7079aa3
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

<<<<<<< HEAD
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::loginView(function () {
    return view('auth.login');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
=======


Route::get('/', [ContactController::class, 'index']);

Route::get('/contacts', [ContactController::class, 'showForm'])->name('contacts.form');  // フォーム表示（GET）

Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');  // データ保存（POST）

Route::get('/contacts/complete', [ContactController::class, 'complete'])->name('contacts.complete');  // 完了ページ（GET）
>>>>>>> a6eab46c3a2501eaeeadcf98623c369db7079aa3
