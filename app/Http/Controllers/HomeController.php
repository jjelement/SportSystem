<?php

namespace App\Http\Controllers;


use App\Models\Event;

class HomeController extends Controller
{
    public function renderPage() {
        $events = Event::orderBy('created_at', 'DESC')->get();
        return view('home', ['events' => $events]);
    }
}
