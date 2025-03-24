<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>確認画面</title>
</head>

<body>
    <div class="container">
        <h2>確認画面</h2>

        <form action="{{ route('contact.confirm.post') }}" method="POST">
            @csrf
            <div>
                <h3>お名前（姓）: {{ $validatedData['last_name'] }}</h3>
                <h3>お名前（名）: {{ $validatedData['first_name'] }}</h3>
                <h3>性別: {{ $validatedData['gender'] == 'male' ? '男性' : ($validatedData['gender'] == 'female' ? '女性' : 'その他') }}</h3>
                <h3>メールアドレス: {{ $validatedData['email'] }}</h3>
                <h3>電話番号: {{ $validatedData['phone'] }}</h3>
                <h3>住所: {{ $validatedData['address'] }}</h3>
                <h3>建物名: {{ $validatedData['building'] }}</h3>
                <h3>お問い合わせの種類: {{ $validatedData['category'] }}</h3>
                <h3>お問い合わせ内容: {{ $validatedData['message'] }}</h3>
            </div>

            <button type="submit">送信する</button>
        </form>

        <a href="{{ route('contact.index') }}">修正する</a>
    </div>
</body>

</html>