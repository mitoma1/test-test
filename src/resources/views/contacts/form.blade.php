<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>

<body>
    <h1>お問い合わせフォーム</h1>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('contacts.confirm') }}" method="POST">
        @csrf
        <label>姓（Last Name）:</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
        <br>

        <label>名（First Name）:</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
        <br>

        <label>メールアドレス:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br>

        <label>電話番号:</label>
        <input type="tel" name="tel" value="{{ old('tel') }}" required>
        <br>

        <label>会社名:</label>
        <input type="text" name="company" value="{{ old('company') }}">
        <br>

        <label>お問い合わせ内容:</label>
        <textarea name="content" required>{{ old('content') }}</textarea>
        <br>

        <button type="submit">確認画面へ</button>
    </form>
</body>

</html>