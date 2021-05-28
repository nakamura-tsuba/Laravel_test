@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規作成</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <form method="POST" action="{{route('contact.store')}}">
                                @csrf
                                氏名
                                <input class="form-control" type="text" name="your_name">
                                <br>
                                件名
                                <input class="form-control" type="text" name="title">
                                <br>
                                メールアドレス
                                <input class="form-control" type="email" name="email">
                                <br>
                                <div class="mb-3">
                                ホームページ
                                <input class="form-control" type="url" name="url">
                                <br>
                                </div>
                                <div class="mb-3">
                                カテゴリ
                                <select name="category_id">
                                    <option value="">選択してください</option>
                                    <option value="1">相談</option>
                                    <option value="2">クレーム</option>
                                    <option value="3">その他</option>
                                </select>
                                </div>
                                <div class="mb-1">
                                性別
                                <input type="radio" name="gender" value="0">男性</input>
                                <input type="radio" name="gender" value="1">女性</input>
                                </div>
                                <br>
                                <div>
                                年齢
                                <select name="age">
                                    <option value="">選択してください</option>
                                    <option value="1">〜19歳</option>
                                    <option value="2">20歳〜29歳</option>
                                    <option value="3">30歳〜39歳</option>
                                    <option value="4">40歳〜49歳</option>
                                    <option value="5">50歳〜59歳</option>
                                    <option value="6">60歳〜</option>
                                </select>
                                </div>
                                <br>
                                お問い合わせ内容
                                <textarea rows="7" class="form-control" name="contact"></textarea>
                                <br>

                                <input type="checkbox" name="caution" value="1">注意事項に同意する
                                <br>
                                <input class="btn btn-outline-primary" type="submit" value="登録する">
                            </form>
                            <form method="GET" action="{{route('contact.index')}}">
                                @csrf
                                <input class="btn btn-outline-primary" type="submit" value="一覧に戻る">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
