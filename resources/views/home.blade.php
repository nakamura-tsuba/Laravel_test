@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Home画面
                        <form method="GET" action="{{ route('contact.index') }}">
                            <button type="submit" class="btn btn-primary" >一覧へ移動する</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
