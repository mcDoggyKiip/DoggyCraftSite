<?php

namespace App\Http\Controllers;

use App\Events\GamemodeStatusChanged;
use App\Gamemode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamemodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamemodes = Gamemode::all();

        return view('gamemode.index')->with(["gamemodes" => $gamemodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset(Auth::user()->mc_username)){
            if(in_array("owner", Auth::user()->LpPlayer->groups())){
                return view('gamemode.create');
            }
        }
        return redirect(route('gamemode.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset(Auth::user()->mc_username)){
            if(in_array("owner", Auth::user()->LpPlayer->groups())){
                $name = $request->input('name');
                $port = $request->input('port');
                $added_to_server = $request->input('added_to_server');
                $desription = $request->input('description');

                Gamemode::create([
                    "gamemode" => $name,
                    "port" => $port,
                    "added_to_server" => $added_to_server,
                    "description" => $desription
                ]);
                return redirect(route('gamemode.index')); // #TODO: make an success message appear on index page to state gamemode is created!
            }
        }
        return redirect(route('gamemode.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param Gamemode $gamemode
     * @return \Illuminate\Http\Response
     */
    public function show(Gamemode $gamemode)
    {
        if(isset($gamemode)){
            return view('gamemode.view')->with(["gamemode" => $gamemode]);
        }else{
            return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gamemode $gamemode
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamemode $gamemode)
    {
        if(isset(Auth::user()->mc_username)){
            if(in_array("owner", Auth::user()->LpPlayer->groups())){
                if(isset($gamemode)){
                    return view('gamemode.edit')->with(["gamemode" => $gamemode]);
                }else{
                    return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
                }
            }
        }
        return redirect(route('gamemode.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Gamemode $gamemode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamemode $gamemode)
    {
        if(isset(Auth::user()->mc_username)){
            if(in_array("owner", Auth::user()->LpPlayer->groups())){
                $name = $request->input('name');
                $port = $request->input('port');
                $added_to_server = $request->input('added_to_server');
                $description = $request->input('description');

                $gamemode->update([
                    "gamemode" => $name,
                    "port" => $port,
                    "added_to_server" => $added_to_server,
                    "description" => $description
                ]);

                event(new GamemodeStatusChanged($gamemode));

                if(isset($gamemode)){
                    return view('gamemode.view')->with(["gamemode" => $gamemode]); // #TODO: make success message appear on view page
                }else{
                    return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
                }
            }
        }
        return redirect(route('gamemode.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gamemode $gamemode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamemode $gamemode)
    {
        if(isset(Auth::user()->mc_username)){
            if(in_array("owner", Auth::user()->LpPlayer->groups())){
                try {
                    $gamemode->delete();
                } catch (\Exception $e) {
                }
                return redirect(route('gamemode.index')); // #TODO: make an success message appear on index page to state gamemode got deleted!
            }
        }
        return redirect(route('gamemode.index'));
    }
}
