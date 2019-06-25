<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddParticipantRequest;
use App\Models\Event;
use App\Models\Province;
use App\Models\RaceType;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventDetailPage(Event $event) {
        $parameters = [
            'event' => $event,
        ];

        if(auth()->check()) {
            $profile = auth()->user();
            $provinces = Province::get();
            $birthDate = explode('-', $profile->birthdate);
            $birthDate = [
                'day' => (int)$birthDate[2],
                'month' => (int)$birthDate[1],
                'year' => (int)$birthDate[0]
            ];
            $parameters['profile'] = $profile;
            $parameters['provinces'] = $provinces;
            $parameters['birthDate'] = $birthDate;
        }

        return view('event', $parameters);
    }

    public function addParticipant(AddParticipantRequest $request) {
        $participants = session()->get('participants', []);
        $participant = $request->validated();
        $participant['raceType'] = RaceType::find($request->raceTypeId)->toArray();
        $participant['raceType']['price'] = number_format($participant['raceType']['price']);

        $timestamp = $request->timestamp ?: time();
        $participant['timestamp'] = $timestamp;
        $participants[$timestamp] = $participant;

        session()->put('participants', $participants);
    }

    public function getParticipants(Request $request) {
        if($timestamp = $request->timestamp) {
            $participants = session()->get('participants', []);
            return isset($participants[$timestamp]) ? $participants[$timestamp] : null;
        }
        return session()->get('participants');
    }

    public function removeParticipant(Request $request) {
        $timestamp = $request->timestamp;
        $participants = session()->get('participants');
        unset($participants[$timestamp]);
        session()->put('participants', $participants);
    }
}
