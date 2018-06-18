<?php

namespace App\Http\Controllers\Lapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        // TODO: rename to slug:
        $data['alias'] = str_slug($data['name'], '-');

        $data['avatar'] = $request->logo;

        // Storage::disk('local')->put($data['avatar'], ?);
        $path = $request->file('logo')->store('public/logos');
        $fullPath =  Storage::url($path);

        $team = Team::create([
            'name' => $data['name'],
            'alias' => $data['alias'],
            'background' => $fullPath,
        ]);

        return $team;
    }
}
