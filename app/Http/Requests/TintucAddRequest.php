<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TintucAddRequest extends FormRequest
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
            'sltCate' =>'required',
            'txtTitle' =>'required|unique:lv17_tintuc,tieude',
            'txtIntro' =>'required',
            'txtFull' =>'required',
            'newsImg' =>'required|image',
            ];

    }
        
    public function messages(){
    	return[
    	'sltCate.required' => 'Vui lòng chọn danh mục',
    	'txtTitle.required' => 'Vui lòng nhập tiêu đề',
    	'txtTitle.unique' => 'Tiêu đề này đã tồn tại',
    	'txtIntro.required' => 'Vui lòng nhập tóm tắt tin',
    	'txtFull.required' => 'Vui lòng nhập nội dung',
    	'newsImg.required' => 'Vui lòng chọn hình',
        'newsImg.image' => 'Không đúng định dạng hình',
       
       
    	];
    }
}
