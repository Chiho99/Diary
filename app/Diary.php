<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    // diariesテーブルとusresテーブルが、likesテーブルを中間テーブルとした多対多の関係
    public function likes(){
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
}
