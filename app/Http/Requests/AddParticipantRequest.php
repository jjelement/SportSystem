<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddParticipantRequest extends FormRequest
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
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
            'passportNo' => '',
            'gender' => 'required|in:M,F',
            'day' => 'required|between:1,31',
            'month' => 'required|between:1,12',
            'year' => 'required|integer',
            'tel' => 'required',
            'healthIssue' => '',
            'bloodType' => 'required|in:A,B,AB,O,Unknown',
            'contactName' => '',
            'contactRelationship' => '',
            'contactPhoneNumber' => '',
            'raceTypeId' => '',
            'timestamp' => '',
        ];
    }
}
