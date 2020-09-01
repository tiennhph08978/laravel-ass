<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'type_name'=>'required|max:25|min:5|unique:type_products',
            'description'=>'required|min:15|max:305'
        ];
    }

    public function messages(){
        return[
            'required'=>':attribute không được để trống',
            'type_name.max'=>'tên không được để quá 25 kí tự',
            'type_name.min'=>'tên không được để nhỏ hơn 5 kí tự',
            'type_name.unique'=>'tên danh mục đã tồn tại',
            'description.min'=>'miêu tả không được nhỏ hơn 15 kí tự',
            'description.max'=>'miêu tả không được lớn hơn 305 kí tự',
        ];
    }

    public function attributes(){
        return[
        'type_name'=>'danh mục',
        'description'=>'Miêu tả'
        ];
    }
}
