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
                                @if($gamemode['status']['online'])
                                    <div class="card card-green">
                                @else
                                    <div class="card card-red">
                                @endif
                                        <div class="card-header">{{$gamemode["name"]}}</div>

                                        <div class="card-body">
                                            <div class="row">
                                                @if($gamemode['status']['online'])
                                                    Status : Online
                                                    <br />
                                                    Playing: {{$gamemode['status']['players']."/".$gamemode['status']['max_players']}}
                                                @else
                                                    Status : Offline
                                                @endif
                                            </div>
                                            <br />
                                            <div class="row">
                                                <a class="btn btn-app bg-green" href="{{route('gamemode.show', ['gamemode' => $gamemode["id"]])}}">
                                                    <i class="fa fa-info"></i> More Info
                                                </a>
                                                <a class="btn btn-app bg-primary" href="{{route('gamemode.edit', ['gamemode' => $gamemode["id"]])}}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection