<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NamhocEditRequest extends FormRequest
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
            'tennamhoc' => 'required',
            'khoahoc' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'tennamhoc.required' => 'Vui lòng nhập năm học',
            'khoahoc.required' => 'Vui lòng nhập khóa học',

        ];
    }
}
