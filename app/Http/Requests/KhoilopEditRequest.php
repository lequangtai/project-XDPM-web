<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoilopEditRequest extends FormRequest
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
            'txtKhoi' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'txtKhoi.required' => 'Vui lòng nhập tên khối'
        ];
    }
}
