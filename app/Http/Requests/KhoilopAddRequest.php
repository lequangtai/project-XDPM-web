<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoilopAddRequest extends FormRequest
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
            'txtKhoi' => 'required|unique:lv17_khoilop,tenkhoi'
        ];
    }
    public function messages()
    {
        return[
            'txtKhoi.required' => 'Vui lòng nhập tên khối',
            'txtKhoi.unique' => 'Khối lớp này đã tồn tại'
        ];
    }
}
