<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="heading">お問い合わせ内容の確認</h2>

    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                @if ($data['gender'] === 'male') 男性
                @elseif ($data['gender'] === 'female') 女性
                @else その他
                @endif
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $data['address'] }} {{ $data['building'] ?? '' }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $data['category'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $data['message'] }}</td>
        </tr>
    </table>

    <div class="button-group">
        <a href="{{ route('contact.index') }}" class="button button-back">修正する</a>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $data['gender'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
            <input type="hidden" name="address" value="{{ $data['address'] }}">
            <input type="hidden" name="building" value="{{ $data['building'] ?? '' }}">
            <input type="hidden" name="category" value="{{ $data['category'] }}">
            <input type="hidden" name="message" value="{{ $data['message'] }}">
            <button type="submit" class="button button-submit">送信する</button>
        </form>
    </div>
</div>
@endsection