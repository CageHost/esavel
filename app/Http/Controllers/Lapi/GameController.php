<?php

namespace App\Http\Controllers\Lapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Game;

class GameController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $games = Game::where('active', 1)
        $games = Game::orderBy('name', 'desc')
          ->take(100)
          ->get();

        return response()->json($games);
    }

    public function show($alias)
    {
        $game = Game::where('alias', '=', $alias)->firstOrFail();
        return response()->json($game);
    }
}
