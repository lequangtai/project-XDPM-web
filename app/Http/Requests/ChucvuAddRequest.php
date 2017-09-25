<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChucvuAddRequest extends FormRequest
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
            'txtChucvu' => 'required|unique:lv17_chucvu,tenchucvu'
        ]; 
    }
    public function messages()
    {
        return[
            'txtChucvu.required' => 'Vui lòng nhập tên chức vụ',
            'txtChucvu.unique' => 'Chức vụ này đã tồn tại'
        ];
    }
}
