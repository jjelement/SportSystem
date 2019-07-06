<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Event\CreateRequest;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('id', 'DESC')->paginate();
        return view('backend.event.index', ['events' => $events]);
    }

    public function create() {
        return view('backend.event.create');
    }

    public function show(Event $event) {
        $user = auth()->user();
        return view('backend.event.show', ['event' => $event, 'user' => $user]);
    }

    public function edit(Event $event) {
        $raceTypeList = $event->raceTypeList->reduce(function($carry, $raceType) {
            $carry['name'][] = $raceType->name;
            $carry['price'][] = $raceType->price;
            $carry['maxParticipants'][] = $raceType->maxParticipants;
            return $carry;
        });
        return view('backend.event.edit', ['event' => $event, 'raceTypeList' => $raceTypeList]);
    }

    public function store(CreateRequest $request) {
        $event = $request->validated();
        $raceTypeList = $event['raceType'];
        unset($event['raceType']);

        $extension = $request->profileImage->extension();
        $event['profileImage'] = $request->profileImage->storeAs('images/events', time().'.'.$extension);
        $event['created_at'] = now();
        $event['updated_at'] = now();

        $event = new Event($event);
        $event->save();

        $raceTypeCount = count($raceTypeList['name']);
        $raceTypeData = [];
        for($i = 0; $i < $raceTypeCount; $i++) {
            $raceTypeData[] = [
                'name' => $raceTypeList['name'][$i],
                'price' => $raceTypeList['price'][$i],
                'maxParticipants' => $raceTypeList['maxParticipants'][$i],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        $event->raceTypeList()->createMany($raceTypeData);
        return redirect()->route('backend.event.index')->with('success', 'เพิ่ม Event: <b>'.$event['name'].'</b> เรียบร้อย');
    }

    public function update(UpdateRequest $request, Event $event) {
        $eventData = $request->validated();
        $raceTypeList = $eventData['raceType'];
        unset($eventData['raceType']);

        if($request->hasFile('profileImage')) {
            $extension = $request->profileImage->extension();
            @Storage::delete($event->profileImage);
            $eventData['profileImage'] = $request->profileImage->storeAs('images/events', time().'.'.$extension);
        }
        $eventData['updated_at'] = now();
        $event->update($eventData);

        $raceTypeCount = count($raceTypeList['name']);
        $raceTypeData = [];
        for($i = 0; $i < $raceTypeCount; $i++) {
            $raceTypeData[] = [
                'name' => $raceTypeList['name'][$i],
                'price' => $raceTypeList['price'][$i],
                'maxParticipants' => $raceTypeList['maxParticipants'][$i],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $event->raceTypeList()->delete();
        $event->raceTypeList()->createMany($raceTypeData);
        return redirect()->route('backend.event.edit', $event->id)->with('success', 'แก้ไข Event: <b>'.$event->name.'</b> เรียบร้อย');
    }

    public function delete(Event $event) {
        @Storage::delete($event->profileImage);
        $event->delete();
        return redirect()->route('backend.event.index')->with('success', 'ลบ Event: <b>'.$event->name.'</b> เรียบร้อย');
    }
}
