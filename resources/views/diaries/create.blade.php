@extends('layout')

@section('title')
新規投稿画面
@endsection

@section('content')
    <section class="container m-5">
        <div class="row justify-content-center">
            <div class="col-8">
            @if($errors->any())
                <ul>
                    <!-- バリデーション表示 -->
                    <!-- Laravelではバリデーションのエラーは全て$errorsという変数に入る -->
                    @foreach($errors->all() as $message)
                        <li class="alert alert-danger">{{$message}}</li>
                    @endforeach
                </ul>
            @endif
            <!-- <form action="遷移先のページのURL"></form> -->
            <!-- ここではrouteに指定したnameのURLに変換される -->
                <form action="{{ route('diary.create') }}" method="POST">
            <!-- ユーザーが意図しない不正な書き込みなどができる脆弱性、
            　またはその脆弱性を利用した攻撃を防ぐ -->
                @csrf
                    <div class="form-group">
                        <!-- 入力内容が保持できるようにold(name属性)を入力 -->
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea class="form-control" name="body" id="body">{{old('body')}}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">投稿</button>
                    </div>
                </>
            </div>
        </div>
    </section>
@endsection
