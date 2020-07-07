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
            array_push($gamemodes,["id" => $gamemode->id,"name" => $gamemode->gamemode, "status" => $gamemode->getStatus()]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
