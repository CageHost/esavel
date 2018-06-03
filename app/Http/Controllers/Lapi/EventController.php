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

    public function show($alias)
    {
        // TODO: example works for id
        //  $event = Event::with('types')->find($id);
        // TODO: Don't return it with the pivot columns lol
        $event = Event::where('alias', '=', $alias)->with('types')->with('games')->firstOrFail();
        return response()->json($event);
    }
}
