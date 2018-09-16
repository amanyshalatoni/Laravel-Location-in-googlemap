<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//مش شرط يكون عامل تسجيل دخول
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        //    'name' => 'required|max:50',
          //  'email' => 'required|email|max:50',
            'plate_type_id'=> 'required',
            'from_date'=> 'required',
            'to_date'=> 'required'
            
        ];
    }
    public function messages()
    {
        return [
        //    'name.required' => 'الرجاء ادخل التصنيف',
                        'plate_type_id.required' => 'الرجاء ادخل نوع اللوحة',

                        'from_date.required' => 'الرجاء ادخل تارخ وضع اللوحة',

                        'to_date.required' => 'الرجاء ادخل لمتى ستكون اللوحة متواجدة'

        ];
        
    }
}
