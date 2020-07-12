<?php

namespace App\Http\Controllers;

use App\Gamemode;
use Illuminate\Http\Request;

class GamemodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamemodes = [];

        foreach (Gamemode::all() as $gamemode){
            array_push($gamemodes,["id" => $gamemode->id, "added_to_server" => $gamemode->added_to_server, "name" => $gamemode->gamemode, "status" => $gamemode->getStatus()]);
        }

        return view('gamemode.index')->with(["gamemodes" => $gamemodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gamemode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $port = $request->input('port');
        $desription = $request->input('description');

        Gamemode::create([
            "gamemode" => $name,
            "port" => $port,
            "description" => $desription
        ]);

        return redirect(route('gamemode.index')); // #TODO: make an success message appear on index page to state gamemode is created!
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gamemode = Gamemode::all()->where('id', '==', $id)->first();
        if(isset($gamemode)){
            return view('gamemode.view')->with(["gamemode" => $gamemode]);
        }else{
            return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gamemode = Gamemode::all()->where('id', '==', $id)->first();

        if(isset($gamemode)){
            return view('gamemode.edit')->with(["gamemode" => $gamemode]);
        }else{
            return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gamemode = Gamemode::findOrFail($id);

        $name = $request->input('name');
        $port = $request->input('port');
        $desription = $request->input('description');

        $gamemode->update([
            "gamemode" => $name,
            "port" => $port,
            "description" => $desription
        ]);

        if(isset($gamemode)){
            return view('gamemode.view')->with(["gamemode" => $gamemode]); // #TODO: make success messafe appear on view page
        }else{
            return redirect(route('gamemode.index')); // #TODO: make an error message appear on index page to state gamemode not found!
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gamemode = Gamemode::findOrFail($id);
        $gamemode->delete();
        return redirect(route('gamemode.index')); // #TODO: make an success message appear on index page to state gamemode got deleted!
    }
}
