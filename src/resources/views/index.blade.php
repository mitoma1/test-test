@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center my-4">Contact</h2>

  <form action="{{ route('contact.confirm') }}" method="POST">
    @csrf
    <table class="table">
      <tbody>
        <!-- お名前 -->
        <tr>
          <th class="bg-light">お名前 <span class="text-danger">※</span></th>
          <td>
            <div class="d-flex">
              <input type="text" name="last_name" class="form-control me-2" placeholder="例: 山田" value="{{ old('last_name') }}">
              <input type="text" name="first_name" class="form-control" placeholder="例: 太郎" value="{{ old('first_name') }}">
            </div>
            @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
            @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- 性別 -->
        <tr>
          <th class="bg-light">性別 <span class="text-danger">※</span></th>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}>
              <label class="form-check-label">男性</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
              <label class="form-check-label">女性</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
              <label class="form-check-label">その他</label>
            </div>
            @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- メールアドレス -->
        <tr>
          <th class="bg-light">メールアドレス <span class="text-danger">※</span></th>
          <td>
            <input type="email" name="email" class="form-control" placeholder="例: test@example.com" value="{{ old('email') }}">
            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- 電話番号 -->
        <tr>
          <th class="bg-light">電話番号 <span class="text-danger">※</span></th>
          <td>
            <input type="text" name="phone" class="form-control" placeholder="例: 08012345678" value="{{ old('phone') }}">
            @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- 住所 -->
        <tr>
          <th class="bg-light">住所 <span class="text-danger">※</span></th>
          <td>
            <input type="text" name="address" class="form-control" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            @error('address') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- 建物名 -->
        <tr>
          <th class="bg-light">建物名</th>
          <td>
            <input type="text" name="building" class="form-control" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
          </td>
        </tr>

        <!-- お問い合わせの種類 -->
        <tr>
          <th class="bg-light">お問い合わせの種類 <span class="text-danger">※</span></th>
          <td>
            <select name="category" class="form-control">
              <option value="" selected>選択してください</option>
              <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
              <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>商品の交換について</option>
              <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>商品トラブル</option>
              <option value="4" {{ old('category') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
              <option value="5" {{ old('category') == '5' ? 'selected' : '' }}>その他</option>
            </select>
            @error('category') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>

        <!-- お問い合わせ内容 -->
        <tr>
          <th class="bg-light">お問い合わせ内容 <span class="text-danger">※</span></th>
          <td>
            <textarea name="message" class="form-control" rows="4" placeholder="お問い合わせ内容をご記載ください">{{ old('message') }}</textarea>
            @error('message') <p class="text-danger">{{ $message }}</p> @enderror
          </td>
        </tr>
      </tbody>
    </table>

    <!-- ボタン -->
    <div class="text-center mt-3">
      <button type="submit" class="btn btn-primary">確認画面</button>
    </div>
  </form>
</div>
@endsection