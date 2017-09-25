<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiemUpdateRequest extends FormRequest
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
            'M1' => 'integer|digits_between:1,10',
            'M2' => 'digits_between:0,10',
            'M3' => 'digits_between:0,10',
            'M4' => 'digits_between:0,10',
            'd15phut1' => 'digits_between:0,10',
            'd15phut2' => 'digits_between:0,10',
            'd15phut3' => 'digits_between:0,10',
            'd15phut4' => 'digits_between:0,10',
            'd1tiet1' => 'digits_between:0,10',
            'd1tiet2' => 'digits_between:0,10',
            'd1tiet3' => 'digits_between:0,10',
            'thi' => 'digits_between:0,10'

        ]; 
    }
    public function messages()
    {
        return[
            'M1[].min'       => 'Điểm miệng1 phải lớn hơn 0',
            'M1[].max'       => 'Điểm miệng1 phải nhỏ hơn 10',
            'M2[].min'       => 'Điểm miệng2 phải lớn hơn 0',
            'M2[].max'       => 'Điểm miệng2 phải nhỏ hơn 10',
            'M3[].min'       => 'Điểm miệng 3phải lớn hơn 0',
            'M3[].max'       => 'Điểm miệng 3phải nhỏ hơn 10',
            'M4[].min'       => 'Điểm miệng 4phải lớn hơn 0',
            'M4[].max'       => 'Điểm miệng 4phải nhỏ hơn 10',
            
            'd15phut1.min' => 'Điểm 15 phút phải lớn hơn 0',
            'd15phut1.max' => 'Điểm 15 phút phải nhỏ hơn 10',
            'd15phut2.min' => 'Điểm 15 phút phải lớn hơn 0',
            'd15phut2.max' => 'Điểm 15 phút phải nhỏ hơn 10',
            'd15phut3.min' => 'Điểm 15 phút phải lớn hơn 0',
            'd15phut3.max' => 'Điểm 15 phút phải nhỏ hơn 10',
            'd15phut4.min' => 'Điểm 15 phút phải lớn hơn 0',
            'd15phut4.max' => 'Điểm 15 phút phải nhỏ hơn 10',
            
            'd1tiet1.min'  => 'Điểm 1 tiết phải lớn hơn 0',
            'd1tiet1.max'  => 'Điểm 1 tiết phải nhỏ hơn 10',
            'd1tiet2.min'  => 'Điểm 1 tiết phải lớn hơn 0',
            'd1tiet2.max'  => 'Điểm 1 tiết phải nhỏ hơn 10',
            'd1tiet3.min'  => 'Điểm 1 tiết phải lớn hơn 0',
            'd1tiet3.max'  => 'Điểm 1 tiết phải nhỏ hơn 10',
            'thi.min'      => 'Điểm thi phải lớn hơn 0',
            'thi.max'      => 'Điểm thi phải nhỏ hơn 10'


        ];
    }
}
