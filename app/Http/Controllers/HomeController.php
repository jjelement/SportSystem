<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Slide;

class HomeController extends Controller
{
    public function renderPage() {
        $events = Event::orderBy('created_at', 'DESC')->get();
        $slides = Slide::orderBy('id', 'DESC')->take(4)->get();
        return view('home', ['events' => $events, 'slides' => $slides]);
    }
}
