<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users,email',
            'firstName' => 'required',
            'lastName' => 'required',
            'passportNo' => '',
            'gender' => 'required|in:M,F',
            'tel' => 'required',
            'tel2' => '',
            'province' => 'required|exists:provinces,name_th',
            'area' => 'required',
            'district' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'day' => 'required|between:1,31',
            'month' => 'required|between:1,12',
            'year' => 'required|integer',
        ];
    }
}
