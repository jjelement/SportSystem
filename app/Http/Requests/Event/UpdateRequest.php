<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'profileImage'      => 'image',
            'name'              => 'required|string',
            'description'       => 'required|string',
            'content'           => 'required|string',
            'maxParticipants'   => '',
            'startRegisterDate' => 'required|date',
            'endRegisterDate'   => '',
            'startDate'         => 'required|date|after:startRegisterDate',
            'endDate'           => '',
            'canWalkIn'         => 'required|boolean',
            'shirtType'         => '',
            'shirtSize'         => '',
            'raceType'          => 'required|array',
        ];
    }
}
