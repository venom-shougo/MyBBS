<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ユーザ管理、機能制限用
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * バリデーション
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3', //入力必須、最低3文字
            'body'  => 'required', //入力必須
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.min'      => ':min 文字以上入力してください',
            'body.required'  => '本文を入力してください'
        ];
    }
}
