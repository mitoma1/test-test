<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
  // お問い合わせフォームページの表示
  public function index()
  {
    return view('index');
  }

  // お問い合わせフォームの表示
  public function showForm()
  {
    return view('contacts.form');
  }

  // お問い合わせ内容の確認
  public function confirm(Request $request)
  {
    // 入力されたデータを取得
    $contact = $request->only(['name', 'company', 'email', 'tel', 'content']);

    // 確認ページにデータを渡して表示
    return view('contacts.confirm', compact('contact'));
  }

  // お問い合わせデータの保存
  public function store(ContactRequest $request)
  {
    // バリデーション済みデータを取得
    $validatedData = $request->validated();

    // データを配列で作成
    $contact = [
      'name' => $validatedData['last_name'] . ' ' . $validatedData['first_name'],
      'company' => $validatedData['company'] ?? '', // 会社名があれば保存
      'email' => $validatedData['email'],
      'tel' => $validatedData['tel'],
      'content' => $validatedData['content'],
    ];

    // データをデータベースに保存
    Contact::create($contact);

    // 完了ページにリダイレクト
    return redirect()->route('contacts.complete')->with('contact', $contact);
  }

  // 完了ページの表示
  public function complete()
  {
    // セッションから保存したデータを取得
    $contact = session('contact');

    // セッションがない場合はフォームにリダイレクト
    if (!$contact) {
      return redirect()->route('contacts.form')->withErrors(['error' => 'セッションが切れました。最初からやり直してください。']);
    }

    // 完了ページにデータを渡して表示
    return view('contacts.complete', compact('contact'));
  }
}
