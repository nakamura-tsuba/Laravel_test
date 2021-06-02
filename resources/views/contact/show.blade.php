@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">詳細画面</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">ID</th>
                                    <th scope="col" class="text-nowrap">氏名</th>
                                    <th scope="col" class="text-nowrap">年齢</th>
                                    <th scope="col" class="text-nowrap">性別</th>
                                    <th scope="col" class="text-nowrap">メールアドレス</th>
                                    <th scope="col" class="text-nowrap">URL</th>
                                    <th scope="col" class="text-nowrap">カテゴリ</th>
                                    <th scope="col" class="text-nowrap">登録日時</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{ $contact->id}}</th>
                                        <td class="text-nowrap">{{ $contact->your_name}}</td>
                                        <td class="text-nowrap">{{ $age}}</td>
                                        <td class="text-nowrap">{{ $gender}}</td>
                                        <td class="text-nowrap">{{ $contact->email}}</td>
                                        <td><a href="{{ $contact->url}}">{{ $contact->url}}</a></td>
                                        <td class="text-nowrap">{{ $contact->category->name}}</td>
                                        <td >{{ $contact->created_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <hr>
                            <h3>問い合わせ内容</h3>
                            <div class="border text-center">
                                    <p class="mt-2">
                                        <b>
                                         {{$contact->contact }}
                                        </b>
                                    </p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-4 align-self-center">
                                    <form method="GET" action="{{route('contact.edit',['id'=> $contact->id])}}">
                                    @csrf
                                    <input class="btn btn-outline-primary" type="submit" value="変更する">
                                    </form>
                                </div>
                            <div class="col-4">
                                <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id ])}}" id="delete_{{ $contact->id}}" >
                                    @csrf
                                    <a href="#" class="btn btn-outline-danger" data-id="{{ $contact->id }}" onclick="deletePost(this);" >削除する</a>
                                </form>
                            </div>
                            <div class="col-4">
                                <form method="GET" action="{{ route('contact.index') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary" >一覧へ移動する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <script>

    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
    }
    </script>
@endsection
