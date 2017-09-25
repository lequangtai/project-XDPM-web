<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonhocAddRequest extends FormRequest
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
            'tenmonhoc' => 'required|unique:lv17_monhoc,tenmonhoc',
            'sotiet' => 'required',
            'sltHeso' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'tenmonhoc.required' => 'Vui lòng nhập tên môn học',
            'tenmonhoc.unique' => 'Môn học này đã tồn tại',
            'sotiet.required' => 'Vui lòng nhập tên môn học',
            'heso.required' => 'Vui lòng chọn hệ số'

        ];
    }
}
