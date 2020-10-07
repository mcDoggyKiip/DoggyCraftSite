@extends('adminlte::page')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __("Gamemodes") }}
                    @if(isset(Auth::user()->mc_username))
                        @if(in_array("owner", Auth::user()->LpPlayer->groups()))
                            <a class="btn bg-blue float-right" href="{{route('gamemode.create')}}"><i class="fa fa-plus"></i> Add Gamemode</a>
                        @endif
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        @if(isset(Auth::user()->mc_username))
                            @if(in_array("owner", Auth::user()->LpPlayer->groups()))
                                <gamemode-component v-for="gamemode in {{$gamemodes}}" :key="gamemode.id" :name="gamemode.gamemode" :gamemode_id="gamemode.id" :added_to_server="gamemode.added_to_server" status="Offline" players="0" max_players="100" csrf="{{csrf_token()}}" :can_edit="true" :can_trash="true"></gamemode-component>
                            @else
                                <gamemode-component v-for="gamemode in {{$gamemodes}}" :key="gamemode.id" :name="gamemode.gamemode" :gamemode_id="gamemode.id" :added_to_server="gamemode.added_to_server" status="Offline" players="0" max_players="100" csrf="{{csrf_token()}}" :can_edit="false" :can_trash="false"></gamemode-component>
                            @endif
                        @else
                            <gamemode-component v-for="gamemode in {{$gamemodes}}" :key="gamemode.id" :name="gamemode.gamemode" :gamemode_id="gamemode.id" :added_to_server="gamemode.added_to_server" status="Offline" players="0" max_players="100" csrf="{{csrf_token()}}" :can_edit="false" :can_trash="false"></gamemode-component>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection