@@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Confirm</h2>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th class="bg-light">お名前</th>
                <td>{{ session('contact_data.last_name') }}　{{ session('contact_data.first_name') }}</td>
            </tr>
            <tr>
                <th class="bg-light">性別</th>
                <td>
                    @if(session('contact_data.gender') === 'male')
                    男性
                    @elseif(session('contact_data.gender') === 'female')
                    女性
                    @else
                    その他
                    @endif
                </td>
            </tr>
            <tr>
                <th class="bg-light">メールアドレス</th>
                <td>{{ session('contact_data.email') }}</td>
            </tr>
            <tr>
                <th class="bg-light">電話番号</th>
                <td>{{ session('contact_data.phone') }}</td>
            </tr>
            <tr>
                <th class="bg-light">住所</th>
                <td>{{ session('contact_data.address') }}</td>
            </tr>
            <tr>
                <th class="bg-light">建物名</th>
                <td>{{ session('contact_data.building') }}</td>
            </tr>
            <tr>
                <th class="bg-light">お問い合わせの種類</th>
                <td>{{ session('contact_data.category') }}</td>
            </tr>
            <tr>
                <th class="bg-light">お問い合わせ内容</th>
                <td>{{ session('contact_data.message') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
        <a href="{{ route('contact.form') }}" class="btn btn-secondary mt-2">修正</a>
    </div>
</div>
@endsection