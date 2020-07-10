<?php

namespace App\Http\Controllers;
// App/Diaryクラスを使用する宣言
use App\Diary;
use App\Http\Requests\CreateDiary;
use Illuminate\Http\Request;


class DiaryController extends Controller
{
    //
    public function index(){
        // diariesテーブルのデータを全件取得
        // useしてるDiaryのallメソッドを実施
        // all()はテーブルのデータを全て取得するメソッド
        $diaries = Diary::all();

        // var_dump()とdie()を合わせたメソッド
        // 変数の確認 + 処理のストップ
        // dd($diaries);

        // view/diaries/index.blade.phpを表示
        // view()はファイルを開くためのメソッド
        // diaries.indexはファイルのパスを表している
        // 第１引数に指定されたページでは、第２引数の連想配列のキー名が、変数名となる
        return view('diaries.index', ['diaries' => $diaries]);
    }
    public function create(){
        // views/diaries/create.blade.phpを表示する
        return view('diaries.create');
    }

    // $request　ユーザーが入力した内容が入っている
    // $request->titleのname属性とすることで、
    // ユーザーが入力した内容を取得できる
    public function store(CreateDiary $request){
        // Diaryモデルをインスタンス化
        $diary = new Diary();
        // 画面で入力されたタイトルを代入
        $diary->title = $request->title;
        // 画面で入力された本文を代入
        $diary->body = $request->body;
        // DBに保存
        $diary->save();

        // 一覧ページにリダイレクト
        return redirect()->route('diary.index');
    }

    // 削除ボタンが押された後の処理
    //  destroy(int $id)には選択されたデータのidが入る
    public function destroy(int $id){
        // Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
        $diary = Diary::find($id);
        // 取得したデータを削除
        $diary->delete();

        return redirect()->route('diary.index');
    }
}
