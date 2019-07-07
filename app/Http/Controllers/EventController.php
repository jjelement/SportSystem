<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddParticipantRequest;
use App\Http\Requests\SubmitTicketRequest;
use App\Models\Event;
use App\Models\Province;
use App\Models\RaceType;
use App\Models\Ticket;
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

        return view('event.show', $parameters);
    }

    public function addParticipant(AddParticipantRequest $request, Event $event) {
        $participants = session()->get('event.'.$event->id.'.participants', []);
        $participant = $request->validated();
        $participant['raceType'] = RaceType::find($request->raceTypeId)->toArray();
        $participant['raceType']['price'] = number_format($participant['raceType']['price']);

        $timestamp = $request->timestamp ?: time();
        $participant['timestamp'] = $timestamp;
        $participants[$timestamp] = $participant;

        session()->put('event.'.$event->id.'.participants', $participants);
        session()->put('event.'.$event->id.'.participants', $participants);
        session()->put('event.'.$event->id.'.participants', $participants);
        session()->put('event.'.$event->id.'.participants', $participants);
        session()->put('event.'.$event->id.'.participants', $participants);
    }

    public function getParticipants(Request $request, Event $event) {
        if($timestamp = $request->timestamp) {
            $participants = session()->get('event.'.$event->id.'.participants', []);
            return isset($participants[$timestamp]) ? $participants[$timestamp] : null;
        }
        return session()->get('event.'.$event->id.'.participants');
    }

    public function removeParticipant(Request $request, Event $event) {
        $timestamp = $request->timestamp;
        $participants = session()->get('event.'.$event->id.'.participants');
        unset($participants[$timestamp]);
        session()->put('event.'.$event->id.'.participants', $participants);
    }

    public function actionSubmitTicket(SubmitTicketRequest $request, Event $event) {
        $user = auth()->user();
        $participants = session()->get('event.'.$event->id.'.participants');
        if($participants) {
            $totalPrice = 0;
            $address = $request->get('address');
            $district_id = $request->get('districtId');
            $deliveryMethod = $request->get('deliveryMethod');

            $ticketParticipants = collect($participants)
                ->map(function($participant) use (&$totalPrice) {
                    $birthdate = $participant['year'].'-'.$participant['month'].'-'.$participant['day'];
                    $participant['birthdate'] = $birthdate;
                    $participant['race_type_id'] = $participant['raceTypeId'];
                    $totalPrice += $participant['raceType']['price'];
                    return $participant;
                })
                ->values()
                ->toArray();

            $ticket = new Ticket([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'price' => $totalPrice,
                'address' => $address,
                'district_id' => $district_id,
                'deliveryMethod' => $deliveryMethod
            ]);
            $ticket->save();
            $ticket->ticketParticipants()->createMany($ticketParticipants);
            session()->forget('event.'.$event->id.'.participants');
            return redirect()->route('ticket.show', $ticket->id);
        }
        return redirect()->back();
    }
}
