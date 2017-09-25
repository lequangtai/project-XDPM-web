<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HockyAddRequest extends FormRequest
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
            'sltHocky' => 'required',
            'sltNamhoc' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'tenhocky.required' => 'Vui lòng chọn học kỳ',
          
            'namhoc_id.required' => 'Vui lòng chọn năm học'
            

        ];
    }
}
