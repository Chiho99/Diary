<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiary extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //  rules()にバリデーションののルールを記述
    public function rules()
    {
        return [
            // formのname属性が'title'の場合入力必須(required)と最大30文字(max:30)を設定
            'title' => 'required|max:30',
            'body' => 'required',
        ];
    // public function attributes()
    // {
    //     return[
    //         'title' => 'タイトル',
    //         'body' =>'本文',
    //     ];
    // }
    }
}
