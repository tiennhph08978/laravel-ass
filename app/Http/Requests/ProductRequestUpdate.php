<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestUpdate extends FormRequest
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
            //
            'name'=>'required|min:5|max:50',
            'description'=>'required|min:10|max:1000',
            'unit_price'=>'required',
            'promotion_price'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages(){
        return[
            'required'=>':attribute không được để trống',
            'name.min'=>'tên không nhỏ hơn 5 kí tự',
            'name.max'=>'tên không lớn hơn 25 kí tự',
            'description.min'=>'miêu ta không nhỏ hơn 10 kí tự',
            'description.max'=>'miêu ta không lớn hơn 1000 kí tự',
            'image.image'=>'không phải file ảnh',
            'image.mimes'=>'không đúng định dạng ảnh'
        ];
    }

    public function attributes(){
        return[
            'name'=>'tên',
            'description'=>'miêu tả',
            'unit_price'=>'giá',
            'promotion_price'=>'giá khuyến mại',
            'image'=>'ảnh'
        ];
    }
}
