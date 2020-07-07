<?php

namespace App\Http\Controllers;

use App\Gamemode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gamemodes = [];
        foreach (Gamemode::all() as $gamemode){
            array_push($gamemodes,["name" => $gamemode->gamemode, "status" => $gamemode->getStatus()]);
        }
        return view('home')->with(["gamemodes" => $gamemodes]);
    }
}
