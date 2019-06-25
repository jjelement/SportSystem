<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Event\CreateRequest;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index() {
        $events = Event::get()->orderBy('id', 'DESC');
        return view('backend.event.index', ['events' => $events]);
    }

    public function create() {
        return view('backend.event.create');
    }

    public function edit(Event $event) {
        return view('backend.event.edit', $event);
    }

    public function store(CreateRequest $request) {

    }

    public function update(UpdateRequest $request) {

    }
}
