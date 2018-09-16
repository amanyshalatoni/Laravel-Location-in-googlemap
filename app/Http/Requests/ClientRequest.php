<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;//مش شرط يكون عامل تسجيل دخول
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'mobile' => 'required',
            'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'الرجاء ادخل الاسم'
        ];
    }
}
