@extends('layouts.app')

@section('content')
<div class="container">
    <h1>管理画面</h1>

    <div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <h2>ユーザーリスト</h2>
    <table class="table">
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>詳細</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users ?? '' as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><button class="btn btn-info">詳細</button></td>
                <td>
                    <form method="POST" action="{{ route('admin.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ページネーションのリンク -->
    {{ $users ?? ''->links() }}
</div>
@endsection