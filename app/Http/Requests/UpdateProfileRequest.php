<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required|in:M,F',
            'tel' => 'required',
            'province' => 'required|exists:provinces,name_th',
            'area' => 'required',
            'district' => 'required',
            'address' => 'required',
            'postalCode' => 'required',
            'passportNo' => '',
        ];
    }
}
