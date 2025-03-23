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
  public function confirm(ContactRequest $request)
  {
    // バリデーション済みデータを取得
    $validatedData = $request->validated();

    // セッションに保存（データを連想配列で保存）
    session()->put('contact_data', $validatedData);

    // 確認ページにデータを渡す
    return view('contacts.confirm', compact('validatedData'));
  }

  // 完了ページの表示
  public function complete()
  {
    $contactData = session('contact_data');

    // セッションが切れていた場合
    if (!$contactData) {
      return redirect()->route('contacts.form')
        ->withErrors(['error' => 'セッションが切れました。最初からやり直してください。']);
    }

    // データベースに保存（確認データがある場合）
    $savedContact = Contact::create([
      'last_name' => $contactData['last_name'],
      'first_name' => $contactData['first_name'],
      'email' => $contactData['email'],
      'phone' => $contactData['phone'],
      'address' => $contactData['address'],
      'building' => $contactData['building'],
      'category' => $contactData['category'],
      'message' => $contactData['message'],
    ]);

    // 完了ページにデータを渡して表示
    return view('contacts.complete', compact('savedContact'));
  }

  // データ保存
  public function store(Request $request)
  {
    // セッションから確認データを取得
    $contactData = session('contact_data');

    // データがない場合はフォームに戻す
    if (!$contactData) {
      return redirect()->route('contacts.form')
        ->withErrors(['error' => 'セッションが切れました。最初からやり直してください。']);
    }

    // データを保存
    $savedContact = Contact::create([
      'last_name' => $contactData['last_name'],
      'first_name' => $contactData['first_name'],
      'email' => $contactData['email'],
      'phone' => $contactData['phone'],
      'address' => $contactData['address'],
      'building' => $contactData['building'],
      'category' => $contactData['category'],
      'message' => $contactData['message'],
    ]);

    // 保存が完了したら完了ページにリダイレクト
    session(['contact_id' => $savedContact->id]);

    return redirect()->route('contacts.complete');
  }
}
