<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Support\Facades\Route;
Route::get('/', 'DiaryController@index')->name('diary.index');

// 投稿処理
Route::get('diary/create', 'DiaryController@create')->name('diary.create');
// 保存処理
Route::post('diary/create', 'DiaryController@store')->name('diary.create');

//削除処理
// {id}には任意の値が入る　今回は削除するレコードを特定
Route::delete('diary/{id}/delete', 'DiaryController@destroy')->name('diary.destroy');
