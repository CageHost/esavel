<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('teams');
    }

    public function show($alias)
    {
        // $team = Team::where('alias', '=', $alias)->firstOrFail();
        return view('team', ['alias' => $alias]);
        // return view('team', ['team' => $team]);
    }
}
