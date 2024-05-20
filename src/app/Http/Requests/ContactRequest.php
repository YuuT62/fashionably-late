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
            'last_name'=>['required','string','max:255'],
            'first_name'=>['required','string','max:255'],
            'gender'=>['required'],
            'email'=>['required','string','email','max:255'],
            'first-number'=>['required','regex:/^[0-9]+$/','max:5'],
            'middle-number'=>['required','regex:/^[0-9]+$/','max:5'],
            'last-number'=>['required','regex:/^[0-9]+$/','max:5'],
            'address'=>['required','string','max:255'],
            'building'=>['string','max:255'],
            'category_id'=>['required'],
            'content'=>['required','string','max:120']
        ];
    }

    public function messages(){
        return[
            'last_name.required'=>'姓を入力してください',
            'last_name.string'=>'姓を文字列で入力してください',
            'last_name.max'=>'姓を255文字以下で入力してください',
            'first_name.required'=>'名を入力してください',
            'first_name.string'=>'名を文字列で入力してください',
            'first_name.max'=>'名を255文字以下で入力してください',
            'gender.required'=>'性別を選択してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.string'=>'メールアドレスを文字列で入力してください',
            'email.email'=>'メールアドレスはメール形式で入力してください',
            'email.max'=>'メールアドレスを255文字以下で入力してください',
            'first-number.required'=>'電話番号を入力してください',
            'first-number.regex'=>'電話番号を数値で入力してください',
            'first-number.max'=>'電話番号は5桁までの数字で入力してください',
            'middle-number.required'=>'電話番号を入力してください',
            'middle-number.regex'=>'電話番号を数値で入力してください',
            'middle-number.max'=>'電話番号は5桁までの数字で入力してください',
            'last-number.required'=>'電話番号を入力してください',
            'last-number.regex'=>'電話番号を数値で入力してください',
            'last-number.max'=>'電話番号は5桁までの数字で入力してください',
            'address.required'=>'住所を入力してください',
            'address.string'=>'住所を文字列で入力してください',
            'address.max'=>'住所を255文字以下で入力してください',
            'building.string'=>'建物は文字列で入力してください',
            'building.max'=>'建物は255文字以下で入力してください',
            'category_id.required'=>'お問い合わせの種類を選択してください',
            'content.required'=>'お問い合わせ内容を入力してください',
            'content.string'=>'お問い合わせ内容を文字列で入力してください',
            'content.max'=>'お問合せ内容は120文字以内で入力してください',
        ];
    }
}
