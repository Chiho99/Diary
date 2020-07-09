<?php

namespace App\Http\Controllers;
// App/Diaryクラスを使用する宣言
use App\Diary;
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
}
