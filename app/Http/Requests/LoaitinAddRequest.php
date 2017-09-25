<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaitinAddRequest extends FormRequest
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
            'txtCateName' => 'required|unique:lv17_loaitin,tenloai'
        ];
    }
    public function messages()
    {
        return[
            'txtCateName.required' => 'Vui lòng nhập tên danh mục',
            'txtCateName.unique' => 'Danh mục này đã tồn tại'
        ];
    }
}
