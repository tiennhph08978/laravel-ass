<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
// use App\Rules\Ce

class LoginRequest extends FormRequest
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
            'email'=>'required|email|exists:users,email',
            'password'=>[
                'required',
                // 'exists:users,password',
                // app()->make(CheckPassword::class)
                ]
        ];
    }

    public function messages(){
        return[
            'required'=>':attribute không được để trống',
            'email.email'=>'email sai dinh dang',
            'email.exists'=>'email chưa được đăng kí',
            // 'password.exists'=>'password sai'
        ];
    }

    public function attributes(){
        return[
            'email'=>'email',
            'password'=>'mật khẩu'
        ];
    }
}
