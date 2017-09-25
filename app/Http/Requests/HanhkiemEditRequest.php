<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HanhkiemEditRequest extends FormRequest
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
            'tenhanhkiem' => 'required|unique:lv17_hanhkiem,tenhanhkiem'
            
        ];
    }
    public function messages()
    {
        return[
            'tenhanhkiem.required' => 'Vui lòng nhập tên hạnh kiểm',
          
            'tenhanhkiem.unique' => 'Hạnh kiểm đã tồn tại'
            

        ];
    }
}
