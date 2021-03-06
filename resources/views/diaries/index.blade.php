<!-- テンプレート名はファイル名の.blade.phpより前の部分 -->
@extends('layouts.app')

@section('title')
一覧
@endsection

@section('content')
<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">
    新規投稿
</a>
@foreach ($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
        <p>{{ $diary->title }}</p>
        <p>{{ $diary->body }}</p>
        <p>{{ $diary->created_at }}</p>
        <!-- 自分の投稿以外では、編集、削除ボタンが表示されないように変更 -->
        <!-- Auth::check（）はログインしているかをチェック。ログインしている場合はtrueを返す -->
        <!-- Auth::user（）->idはログインしているユーザーのidを返す -->
        <!-- ログインしていない場合は Auth::user（）->idが使用できないから&&を使用 -->
        @if (Auth::check() && Auth::user()->id === $diary->user_id)
            <a class="btn btn-success" href="{{ route('diary.edit', ['id' => $diary->id]) }}">編集</a>
            <form action="{{ route('diary.destroy', ['id' => $diary->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger">削除</button>
            </form>
        @endif
        <!-- いいねボタン -->
        <div class=" mt-3 ml-3">
         @if (Auth::check() && $diary->likes->contains(function ($user) {
            return $user->id === Auth::user()->id;
         }))
         <i class="fas fa-heart fa-lg text-danger js-dislike"></i>
        @else
         <i class="far fa-heart fa-lg text-danger js-like"></i>
        @endif
         <input class="diary-id" type="hidden" value="{{ $diary->id }}">
         <!-- count（）を使用することで、紐づいているレコード数を取得していいね数を表示 -->
         <span class="js-like-num">{{ $diary->likes->count() }}</span>
</div>
    </div>
@endforeach
@endsection
