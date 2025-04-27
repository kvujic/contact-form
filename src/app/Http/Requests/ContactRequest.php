<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id' => ['required','exists:categories,id'],
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'gender' => ['required','integer','in:1,2,3'],
            'email' => ['required','email'],
            'tel1' => ['required','string','max:5','regex:/^[0-9]+$/'],
            'tel2' => ['required', 'string', 'max:5', 'regex:/^[0-9]+$/'],
            'tel3' => ['required', 'string', 'max:5', 'regex:/^[0-9]+$/'],
            'address' => ['required','string'],
            'detail' => ['required','string','max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.max' => '電話番号は5桁の数字で入力してください',
            'tel.regex' => '電話番号は半角数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所は文字列で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
