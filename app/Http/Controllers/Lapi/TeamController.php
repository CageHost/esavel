<?php

namespace App\Http\Controllers\Lapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::orderBy('name', 'desc')
          ->take(100)->where('active', 1)
          ->get();
        return response()->json($teams);
    }

    public function show($alias)
    {
        $team = Team::where('alias', '=', $alias)->firstOrFail();
        return response()->json($team);
    }

    public function store(Request $request)
    {
        $data['name'] = $request->input('teamName');

        return Team::create([
            'name' => $data['name']
        ]);
    }
}
