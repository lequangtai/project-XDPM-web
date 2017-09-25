<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhuhuynhAddRequest extends FormRequest
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
            'tenphuhuynh' => 'required',
            'sodienthoai' => 'required|min:10',
            'diachi' =>'required',
            'txtPass' =>'required',
            'txtRepass' =>'required|same:txtPass',

        ];
    }
    public function messages()
    {
        return[
            'tenphuhuynh.required' => 'Vui lòng nhập tên phụ huynh',
            'sodienthoai.required' => 'Vui lòng nhập số điện thoại',
            'sodienthoai.min' =>'Số điện thoại sai',
            'diachi.required' =>'Vui lòng nhập địa chỉ',
            'txtPass.required' => 'Vui lòng nhập mật khẩu',
            'txtRepass.required' => 'Vui lòng nhập lại mật khẩu',
            'txtRepass.same' => 'Hai mật khẩu không trùng'

        ];
    }
}
