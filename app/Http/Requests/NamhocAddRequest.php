<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NamhocAddRequest extends FormRequest
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
            'tennamhoc' => 'required|unique:lv17_namhoc,tennamhoc',
            'khoahoc' => 'required|unique:lv17_namhoc,khoahoc'
        ];
    }
    public function messages()
    {
        return[
            'tennamhoc.required' => 'Vui lòng nhập năm học',
            'tennamhoc.unique' => 'Năm học này đã tồn tại',
            'khoahoc.required' => 'Vui lòng nhập khóa học',
            'khoahoc.unique' => 'Khóa học này đã tồn tại'

        ];
    }
}
