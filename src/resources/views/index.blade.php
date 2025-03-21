<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>


<body>
    <div class="container">
        <div class="contact-form">
            <h2 class="contact-form__heading">お問い合わせフォーム</h2>

            <!-- フォームの開始 -->
            <form action="{{ route('contact.confirm') }}" method="POST">
                @csrf
                <div class="form__name">
                    <div>
                        <label for="last_name" class="form__label form__label--required">お名前（姓） *</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                        <span class="form__error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="first_name" class="form__label form__label--required">お名前（名） *</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}">
                        @error('first_name')
                        <span class="form__error">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- 性別選択 -->

                    <div>
                        <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                        <label for="male">男性</label>
                    </div>
                    <div>
                        <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                        <label for="female">女性</label>
                    </div>
                    <div>
                        <input type="radio" id="other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                        <label for="other">その他</label>
                    </div>



                    <div>
                        <label for="email" class="form__label">メールアドレス *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="form__label">電話番号 *</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="form__label">住所 *</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}">
                        @error('address')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="building" class="form__label">建物名</label>
                        <input type="text" id="building" name="building" value="{{ old('building') }}">
                        @error('building')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="form__label">お問い合わせの種類 *</label>
                        <select id="category" name="category">
                            <option value="">選択してください</option>
                            <option value="商品のお届けについて" {{ old('category') == '商品のお届けについて' ? 'selected' : '' }}>商品のお届けについて</option>
                            <option value="商品交換について" {{ old('category') == '商品交換について' ? 'selected' : '' }}>商品交換について</option>
                            <option value="商品トラブル" {{ old('category') == '商品トラブル' ? 'selected' : '' }}>商品トラブル</option>
                            <option value="ショップへのお問い合わせ" {{ old('category') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                            <option value="その他" {{ old('category') == 'その他' ? 'selected' : '' }}>その他</option>
                        </select>
                        @error('category')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- お問い合わせ内容 -->
                    <div class="form__group form__input">
                        <label class="form__label" for="message">お問い合わせ内容</label>
                        <textarea id="message" name="message" placeholder="お問い合わせ内容を入力してください">{{ old('message') }}</textarea>
                    </div>


                    <button type="submit">確認画面</button>
            </form>
        </div>
    </div>
</body>