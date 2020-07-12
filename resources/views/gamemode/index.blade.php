@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("Gamemodes") }} <a class="btn bg-blue float-right" href="{{route('gamemode.create')}}"><i class="fa fa-plus"></i> Add Gamemode</a></div>

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
                                            <hr />
                                            <div class="row">
                                                <form action="{{route('gamemode.show', ['gamemode' => $gamemode["id"]])}}" method="POST">
                                                    @csrf()
                                                    <button type="submit" class="btn btn-app bg-info"><i class="fa fa-info"></i> More Info</button>
                                                </form>
                                                <form action="{{route('gamemode.edit', ['gamemode' => $gamemode["id"]])}}" method="POST">
                                                    @csrf()
                                                    <button type="submit" class="btn btn-app bg-primary"><i class="fa fa-edit"></i> Edit</button>
                                                </form>
                                                <form action="{{route('gamemode.destroy', ['gamemode' => $gamemode["id"]])}}" method="POST">
                                                    @csrf()
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-app bg-danger"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- #TODO: make ribbon only appear when the gamemode is newe than a month --}}
                                    @if(strtotime($gamemode['added_to_server']) >= strtotime('-1 month'))
                                        <div class="ribbon-wrapper ribbon-xl" style="right: 2px; top: -2px; width: 192px; height: 190px;">
                                            <div class="ribbon bg-warning text-lg" style="right: 3px;">NEW GAME</div>
                                        </div>
                                    @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection