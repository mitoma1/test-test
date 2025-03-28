<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Contact Form
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>お問い合わせ内容確認</h2>
            </div>

            <form class="form" action="{{ route('contacts.confirm') }}" method="POST">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if ($data['gender'] == 'male') 男性
                                @elseif ($data['gender'] == 'female') 女性
                                @else その他
                                @endif
                                <input type="hidden" name="gender" value="{{ $data['gender'] ?? '' }}">
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">会社名</th>
                            <td class="confirm-table__text">
                                {{ $contact['company'] ?? '未入力' }}
                                <input type="hidden" name="company" value="{{ $contact['company'] ?? '' }}">
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                {{ $data['email'] ?? '' }}
                                <input type="hidden" name="email" value="{{ $data['email'] ?? '' }}">
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                {{ $data['tel'] ?? '' }}
                                <input type="hidden" name="tel" value="{{ $data['tel'] ?? '' }}">
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                {{ $data['content'] ?? '' }}
                                <input type="hidden" name="content" value="{{ $data['content'] ?? '' }}">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>