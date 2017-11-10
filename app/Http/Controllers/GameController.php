<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('games');
    }

    public function show($alias)
    {
        return view('game', ['alias' => $alias]);
        // return view('game', ['game' => Game::findOrFail($id)]);
    }
}
