<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="container">
        <div class="contact-form">
            <h2 class="contact-form__heading">お問い合わせありがとうございました</h2>

            <a href="{{ route('contact.index') }}">HOME</a>
        </div>
    </div>
</body>

</html>