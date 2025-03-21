<!DOCTYPE html>
<html lang="ja">

<head>
<<<<<<< HEAD
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
=======
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
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
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">

        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__name-group">
              <input type="text" name="last_name" placeholder="山田" value="{{ old('last_name') }}" />
              <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}" />
            </div>
            <div class="form__error">

              @error('last_name')
              {{ $message }}
              @enderror
              @error('first_name')
              {{ $message }}
              @enderror

            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">会社名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="company" placeholder="株式会社〇〇" value="{{ old('company') }}" />
            </div>
            <div class="form__error">
              @error('company')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">

            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tel" placeholder="09012345678" value="{{ old('tel') }}" />
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="資料をいただきたいです">{{ old('content') }}</textarea>
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
>>>>>>> a6eab46c3a2501eaeeadcf98623c369db7079aa3
