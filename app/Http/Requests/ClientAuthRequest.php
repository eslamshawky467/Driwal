<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientAuthRequest extends FormRequest
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
            'name'=> 'required|string|max:20',
            'email' =>'required|email|unique:clients',
            'password' => 'required|string|min:8',
            'phonenumber'=>'required',
            'id_number' =>'required',
        ];

    }
    public function messages()
    {
        return [
            'email.required' =>'E-mail Required ',
            'email.email' =>'Please Enter  Email',
            'password.required' =>' Password Required ',
            'password.min'=>'This password is Very Short',
            'name.required'=>'Name is Required',
            'name.max'=>'Name is very Long',
            'phone_number.required'=>'Phone Number Required',
            'email.unique'=>'email is Already Taken',
        ];
    }
}
