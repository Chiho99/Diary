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
