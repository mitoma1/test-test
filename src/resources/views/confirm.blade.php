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

<body>
    <div class="container">
        <div class="contact-form">
            <h2 class="contact-form__heading">お問い合わせ内容の確認</h2>

            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="form__group">
                    <label class="form__label">お名前</label>
                    <p class="form__value">{{ session('last_name', '未入力') }} {{ session('first_name', '未入力') }}</p>
                    <input type="hidden" name="last_name" value="{{ session('last_name', '') }}">
                    <input type="hidden" name="first_name" value="{{ session('first_name', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">性別</label>
                    <p class="form__value">
                        @if (session('gender') == 'male') 男性
                        @elseif (session('gender') == 'female') 女性
                        @else その他
                        @endif
                    </p>
                    <input type="hidden" name="gender" value="{{ session('gender', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">メールアドレス</label>
                    <p class="form__value">{{ session('email', '未入力') }}</p>
                    <input type="hidden" name="email" value="{{ session('email', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">電話番号</label>
                    <p class="form__value">{{ session('phone', '未入力') }}</p>
                    <input type="hidden" name="phone" value="{{ session('phone', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">住所</label>
                    <p class="form__value">{{ session('address', '未入力') }}</p>
                    <input type="hidden" name="address" value="{{ session('address', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">建物名</label>
                    <p class="form__value">{{ session('building', '未入力') }}</p>
                    <input type="hidden" name="building" value="{{ session('building', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">お問い合わせの種類</label>
                    <p class="form__value">{{ session('category', '未入力') }}</p>
                    <input type="hidden" name="category" value="{{ session('category', '') }}">
                </div>

                <div class="form__group">
                    <label class="form__label">お問い合わせ内容</label>
                    <p class="form__value">{{ session('message', '未入力') }}</p>
                    <input type="hidden" name="message" value="{{ session('message', '') }}">
                </div>

                <div class="form__buttons">
                    <a href="{{ route('contact.form') }}" class="form__button">修正</a>
                    <button type="submit" class="form__button">送信</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>