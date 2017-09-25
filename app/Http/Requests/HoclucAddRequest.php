<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoclucAddRequest extends FormRequest
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
            'tenhocluc' => 'required|unique:lv17_hocluc,tenhocluc',
            'diemcan' => 'required',
            'diemkhongche' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'tenhocluc.required' => 'Vui lòng nhập tên học lực',
            'tenhocluc.unique' => 'Tên học lực này đã tồn tại',
            'diemcan.required' => 'Vui lòng nhập điểm cận dưới',
            'diemkhongche.required' => 'Vui lòng nhập điểm khống chế'
          

        ];
    }
}
