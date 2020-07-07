@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("Gamemodes") }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($gamemodes as $gamemode)
                            <div class="col-md-4">
                                <a href="{{route('gamemode.show', ['gamemode' => $gamemode["id"]])}}"> {{-- #TODO: make a button instead to view info --}}
                                    @if($gamemode['status']['online'])
                                        <div class="card card-green">
                                    @else
                                        <div class="card card-red">
                                    @endif
                                            <div class="card-header">{{$gamemode["name"]}}</div>

                                            <div class="card-body">
                                                @if($gamemode['status']['online'])
                                                    Status : Online
                                                    <br />
                                                    Playing: {{$gamemode['status']['players']."/".$gamemode['status']['max_players']}}
                                                @else
                                                    Status : Offline
                                                @endif
                                            </div>
                                        </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection