<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('events');
    }

    public function show($alias)
    {
        // $team = Team::where('alias', '=', $alias)->firstOrFail();
        return view('event', ['alias' => $alias]);
        // return view('team', ['team' => $team]);
    }
}
