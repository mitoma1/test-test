<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ完了</title>
</head>

<body>
    <h1>お問い合わせ完了</h1>

    @if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
    @endif

    @isset($contact)
    <p>{{ $contact['name'] }} 様</p>
    <p>お問い合わせありがとうございました。</p>
    <p>会社名: {{ $contact['company'] ?? '未入力' }}</p>
    <p>メールアドレス: {{ $contact['email'] }}</p>
    <p>電話番号: {{ $contact['tel'] }}</p>
    <p>お問い合わせ内容:</p>
    <p>{{ $contact['content'] }}</p>
    @else
    <p>セッションが切れました。最初からやり直してください。</p>
    @endisset

    <a href="{{ route('contacts.form') }}">トップへ戻る</a>
</body>

</html>