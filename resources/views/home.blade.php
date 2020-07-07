@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Server Status') }}</div>

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
                                        @if($gamemode['status']['online'])
                                            Status : Online
                                            <br />
                                            Playing: {{$gamemode['status']['players']."/".$gamemode['status']['max_players']}}
                                        @else
                                            Status : Offline
                                        @endif
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
