<?php

namespace App\Http\Controllers;


use App\Models\Event;

class HomeController extends Controller
{
    public function renderPage() {
        $events = Event::get();
        return view('home', ['events' => $events]);
    }
}
