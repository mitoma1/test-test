<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');  // ログインビューを返す
    }

    // ログイン処理
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ログイン処理
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/admin'); // 認証成功後、管理画面へリダイレクト
        }

        return back()->withErrors(['email' => '認証に失敗しました。']);
    }

    // ログアウト処理
    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
