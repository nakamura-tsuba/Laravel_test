@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">画像表示</div>
                    <!-- エラーメッセージ。なければ表示しない -->
                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif

                <!-- フォーム -->

                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" >
                        <!-- アップロードした画像。なければ表示しない -->
                        @isset ($filename)
                            <div>
                                <img src="{{ asset('storage/' . $filename) }}"width="700px" height="400px">
                            </div>
                        @endisset
                        <label for="photo">画像ファイル:</label>
                        <input type="file" class="form-control" name="file">
                        <br>
                        {{ csrf_field() }}
                        <button class="btn btn-success"> Upload </button>
                    </form>
                <div class="row">
                    <form method="GET" action="{{route('profile')}}" class="col-sm-4">
                        @csrf
                        <input class="btn btn-outline-primary" type="submit" value="画像表示画面に戻る">
                    </form>
                    <form method="GET" action="{{route('contact.index')}}" class="col-sm-4">
                        @csrf
                        <input class="btn btn-outline-primary" type="submit" value="一覧に戻る">
                    </form>
                </div>
            </div>
@endsection
