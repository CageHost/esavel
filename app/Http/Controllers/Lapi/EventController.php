<?php

namespace App\Http\Controllers\Lapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Event;

class EventController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $games = Game::where('active', 1)
        $events = Event::orderBy('name', 'desc')
          ->take(100)
          ->with('types')
          ->get();
        return response()->json($events);
    }

    public function show($id)
    {
        // $event = Event::find($id)->with('types')->firstOrFail();
        $event = Event::with('types')->find($id);
        // $event = Event::where('alias', '=', $alias)->with('types')->firstOrFail();
        return response()->json($event);
    }
}
