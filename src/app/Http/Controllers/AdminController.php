<?php

namespace App\Http\Controllers;

use App\Models\User; // モデル例としてUserを使用
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // admin.index ビューを表示
    }
}
