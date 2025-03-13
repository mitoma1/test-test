<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function showForm()
  {
    return view('contacts.form'); // フォームページのビューを正しく指定
  }

  public function confirm(Request $request)
  {
    $contact = $request->only(['name', 'company', 'email', 'tel', 'content']);
    return view('contacts.confirm', compact('contact'));
  }
  public function store(ContactRequest $request)
  {
    $validatedData = $request->validated();

    // データを保存
    $contact = [
      'name' => $validatedData['last_name'] . ' ' . $validatedData['first_name'],
      'company' => $validatedData['company'] ?? '', // 会社名を追加
      'email' => $validatedData['email'],
      'tel' => $validatedData['tel'],
      'content' => $validatedData['content'],
    ];

    // データ保存
    Contact::create($contact);

    // セッションにデータを保存
    session(['contact' => $contact]);

    // 完了ページにリダイレクト
    return redirect()->route('contacts.complete');
  }

  public function complete()
  {
    // セッションから contact データを取得
    $contact = session('contact', null);

    // セッションが空なら、フォームにリダイレクト
    if (is_null($contact)) {
      return redirect()->route('contacts.form')->withErrors(['error' => 'セッションが切れました。最初からやり直してください。']);
    }

    // 完了ページにデータを渡して表示
    return view('contacts.complete', compact('contact'));
  }
}
