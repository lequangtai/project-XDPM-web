<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyenAddRequest extends FormRequest
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
            'tenquyen' => 'required|unique:lv17_quyen,tenquyen'
        ]; 
    }
    public function messages()
    {
        return[
            'tenquyen.required' => 'Vui lòng nhập tên quyền',
            'tenquyen.unique' => 'Quyền này đã tồn tại'
        ];
    }
}
