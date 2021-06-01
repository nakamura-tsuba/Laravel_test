@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">お問い合わせ一覧</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-2">
                                <form method="GET" action="{{ route('contact.create') }}">
                                @csrf
                                    <button type="submit" class="btn btn-primary" >新規登録</button>
                                </form>
                            </div>
                                <div class="col-sm-4">
                                <form method="GET" action="{{ route('contact.index') }}" class="form-inline my-2 my-lg-0">
                                @csrf
                                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="氏名検索" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                                </form>
                                </div>
                                <div class="col-sm-2">
                                <form method="GET" action="{{ route('contact.index') }}" class="form-inline my-2 my-lg-0">
                                    @csrf
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">クリア</button>
                                </form>
                                </div>
                                <div class="col-sm-2">
                                <form method="GET" action="{{route('profile')}}">
                                    @csrf
                                    <input class="btn btn-outline-primary" type="submit" value="画像表示">
                                </form>
                                </div>
                            </div>
                        </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">氏名</th>
                                    <th scope="col">件名</th>
                                    <th scope="col">カテゴリ</th>
                                    <th scope="col">詳細</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th>{{ $contact->id}}</th>
                                        <td>{{ $contact->your_name}}</td>
                                        <td>{{ $contact->title}}</td>
                                        <td>
                                            @if($contact->category_id===1)
                                                相談
                                            @elseif($contact->category_id===2)
                                                クレーム
                                            @else
                                                その他
                                            @endif
                                        </td>
                                        <td><a href="{{ route('contact.show', ['id' => $contact->id ]) }}">詳細をみる</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
